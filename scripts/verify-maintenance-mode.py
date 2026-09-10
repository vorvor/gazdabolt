#!/usr/bin/env python3
"""Verify Gazda maintenance-mode behavior through real HTTP requests."""

from __future__ import annotations

import http.cookiejar
import socket
import subprocess
import sys
import time
import urllib.error
import urllib.request
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
DRUSH = ROOT / "vendor/bin/drush"
WEB_ROOT = ROOT / "web"
ROUTER = WEB_ROOT / ".ht.router.php"


def run(*args: str) -> str:
    """Run a project command and return stdout."""
    result = subprocess.run(
        args,
        cwd=ROOT,
        check=True,
        capture_output=True,
        text=True,
    )
    return result.stdout.strip()


def request(
    url: str,
    opener: urllib.request.OpenerDirector,
) -> tuple[int, str]:
    """Return an HTTP status and decoded body, including error responses."""
    try:
        response = opener.open(url, timeout=15)
        return response.status, response.read().decode(errors="replace")
    except urllib.error.HTTPError as error:
        return error.code, error.read().decode(errors="replace")


def set_maintenance_mode(enabled: bool) -> None:
    """Set maintenance mode and synchronize Drupal's caches."""
    run(
        str(DRUSH),
        "state:set",
        "system.maintenance_mode",
        str(int(enabled)),
        "--input-format=integer",
    )
    run(str(DRUSH), "cache:rebuild")


def main() -> int:
    """Exercise anonymous and administrator maintenance-mode responses."""
    if not DRUSH.is_file() or not ROUTER.is_file():
        raise RuntimeError("Run this script from a complete project checkout.")

    original_mode = run(
        str(DRUSH),
        "state:get",
        "system.maintenance_mode",
        "--format=string",
    ) == "1"
    server: subprocess.Popen[bytes] | None = None

    try:
        set_maintenance_mode(False)
        run("php", "-l", "web/themes/custom/gazda/gazda.theme")
        errors_before = run(
            str(DRUSH),
            "watchdog:show",
            "--severity=Error",
            "--count=20",
            "--format=json",
        )

        with socket.socket() as port_probe:
            port_probe.bind(("127.0.0.1", 0))
            port = port_probe.getsockname()[1]
        base_url = f"http://127.0.0.1:{port}"
        server = subprocess.Popen(
            [
                "php",
                "-S",
                f"127.0.0.1:{port}",
                "-t",
                str(WEB_ROOT),
                str(ROUTER),
            ],
            cwd=ROOT,
            stdout=subprocess.DEVNULL,
            stderr=subprocess.DEVNULL,
        )

        anonymous = urllib.request.build_opener()
        for _ in range(50):
            try:
                normal_status, normal_body = request(base_url + "/", anonymous)
                if normal_status == 200:
                    break
            except urllib.error.URLError:
                time.sleep(0.1)
        else:
            raise AssertionError("Temporary Drupal server did not become ready.")
        assert 'id="hero"' in normal_body, "Normal storefront hero is missing."

        cookies = http.cookiejar.CookieJar()
        administrator = urllib.request.build_opener(
            urllib.request.HTTPCookieProcessor(cookies),
        )
        login_url = run(
            str(DRUSH),
            "user:login",
            "--no-browser",
            "--uri=" + base_url,
        )
        login_status, _ = request(login_url, administrator)
        assert login_status == 200, "Administrator login failed."

        set_maintenance_mode(True)

        anonymous_status, anonymous_body = request(base_url + "/", anonymous)
        assert anonymous_status == 503, "Anonymous response must be HTTP 503."
        assert 'id="hero"' not in anonymous_body, (
            "Anonymous maintenance response leaked storefront markup."
        )

        admin_status, admin_body = request(base_url + "/", administrator)
        assert admin_status == 200, "Administrator storefront request failed."
        assert 'id="hero"' in admin_body, (
            "Administrator cannot see the storefront in maintenance mode."
        )
        for forbidden_text in (
            "Site under maintenance",
            "Operating in maintenance mode",
        ):
            assert forbidden_text not in admin_body, (
                f"Administrator response contains: {forbidden_text}"
            )

        login_status, login_body = request(base_url + "/user/login", anonymous)
        assert login_status == 200, "The maintenance-exempt login route failed."
        assert "user-login-form" in login_body, "The login form is missing."

        errors_after = run(
            str(DRUSH),
            "watchdog:show",
            "--severity=Error",
            "--count=20",
            "--format=json",
        )
        assert errors_after == errors_before, "New Drupal errors were logged."

        print("PASS: anonymous storefront returns a maintenance HTTP 503")
        print("PASS: administrator sees the storefront without maintenance notices")
        print("PASS: /user/login remains available")
        print("PASS: no new Drupal Error-level watchdog entries")
        return 0
    finally:
        try:
            set_maintenance_mode(original_mode)
        finally:
            if server is not None:
                server.terminate()
                try:
                    server.wait(timeout=5)
                except subprocess.TimeoutExpired:
                    server.kill()
                    server.wait(timeout=5)


if __name__ == "__main__":
    try:
        raise SystemExit(main())
    except (AssertionError, RuntimeError, subprocess.CalledProcessError) as error:
        print(f"FAIL: {error}", file=sys.stderr)
        raise SystemExit(1)
