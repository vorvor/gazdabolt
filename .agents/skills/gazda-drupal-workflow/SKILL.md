---
name: gazda-drupal-workflow
description: Verify Gazda Drupal changes with minimal rediscovery.
version: 0.1.0
author: Gazdabolt maintainers, Hermes Agent
license: MIT
platforms: [linux]
metadata:
  hermes:
    tags: [drupal, gazda, maintenance, verification]
    related_skills: [drupal-theme-development]
---

# Gazda Drupal Workflow

Use the project's shortest reliable paths for Gazda theme, configuration, and maintenance-mode work. Keep discovery targeted and use the checked-in verifier instead of rebuilding HTTP test harnesses.

## When to Use

- Changing `web/themes/custom/gazda`.
- Debugging maintenance-mode rendering or permissions.
- Exporting or checking Drupal configuration.
- Verifying frontend Drupal behavior without a browser.

Do not use for visual fidelity checks that genuinely require screenshots.

## Project Map

- Drupal 11 web root: `web`
- Default theme: `web/themes/custom/gazda`
- Theme logic: `web/themes/custom/gazda/gazda.theme`
- Layouts: `web/themes/custom/gazda/templates/layout`
- Exported config: `config/sync`
- Admin theme: Gin; Gazda inherits Claro
- Maintenance verifier: `scripts/verify-maintenance-mode.py`

## Procedure

1. Run `terminal(command="git status --short --branch", workdir=".")`. Preserve unrelated changes and untracked database/output artifacts.
2. Locate symbols with targeted `search_files` calls under `web/themes/custom/gazda` or `config/sync`; do not scan `web/core` or `vendor` unless tracing a specific Drupal API.
3. Read only the relevant range of `gazda.theme` or Twig file before patching.
4. Apply focused edits with `patch(mode="patch")`.
5. Run `terminal(command="php -l web/themes/custom/gazda/gazda.theme && vendor/bin/drush cr", timeout=120, workdir=".")` when PHP/theme discovery changed.
6. For maintenance behavior, run `terminal(command="python3 scripts/verify-maintenance-mode.py", timeout=240, workdir=".")`. Completion requires every PASS line.
7. Run `terminal(command="git diff --check && git status --short && git diff --stat", timeout=60, workdir=".")`, then inspect only the modified-file diff.

## Maintenance-Mode Model

- Drupal's maintenance subscriber returns HTTP 503 before page Twig renders for non-exempt users.
- Users with `access site in maintenance mode` bypass that response. Gazda must use the `maintenance_mode` service's `applies()` and `exempt()` methods rather than role-name checks.
- Gazda suppresses its maintenance page and Drupal's maintenance status notice for exempt users while preserving unrelated status messages.
- `/user/login` is maintenance-exempt and must remain available.

## Pitfalls

- Do not add a Twig-only maintenance check. Drupal BigPipe can emit the messenger notice later through an `application/vnd.drupal-ajax` replacement even when `page.highlighted` is hidden.
- Do not hide the whole highlighted region; that drops unrelated messages and local actions. Filter only Drupal's exact maintenance status messages through the messenger service.
- A Drush `state:set system.maintenance_mode` made in a separate CLI process may not affect the HTTP check until cache rebuild. The verifier handles this and always restores the original mode.
- Do not recreate temporary Python/HTTP scripts or install Chromium for maintenance checks; use the verifier.
- `drush sql:query` may fail because this container's MariaDB client requests unsupported TLS. Use `drush watchdog:show` for error-log comparisons.
- Start PHP's built-in server with absolute web-root and router paths. The verifier already does this on a free local port and stops it.
- `web/sites/default/settings.php` is ignored and contains environment data. Never expose or commit it. Drush config export belongs in `config/sync`.

## Verification

A maintenance-mode change is complete only when:

- Anonymous `/` returns 503 without the Gazda hero.
- An administrator sees the Gazda hero with no maintenance page or status notice.
- `/user/login` returns 200 with its form.
- The original maintenance state is restored.
- No new Error-level watchdog entries appear.
- `git diff --check` passes.
