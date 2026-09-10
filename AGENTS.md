# Drupal Project Context

Drupal 11 project rooted at `/workspace`; commands already run inside the development container.

## Architecture

- Web root: `web`
- Custom modules: `web/modules/custom`
- Default theme: Gazda at `web/themes/custom/gazda` (Claro base theme)
- Admin theme: Gin
- Exported configuration: `config/sync` outside the web root
- Project-specific Hermes workflows: `.agents/skills`
- Reusable project checks: `scripts`

## Commands

Use `composer`, `php`, `vendor/bin/drush`, `git`, and `curl` directly. Never use `lando`, Docker commands, `sudo`, or `hermes skin`; Lando runs only on the Mac host.

After Drupal changes, run `vendor/bin/drush cr` when needed. For maintenance-mode theme changes, run `python3 scripts/verify-maintenance-mode.py`.

## Development rules

- Inspect the implementation and `git status` before editing.
- Never modify `web/core`, `vendor`, or contributed extensions directly.
- Follow Drupal coding standards and APIs; prefer dependency injection in services.
- Never read, expose, or commit credentials. Site settings files are intentionally ignored.
- Never delete, move, or rename `.lando/`, `.lando.yml`, `AGENTS.md`, `.git/`, or `.gitignore`.
- Do not commit or push unless explicitly requested.

## Verification

Validate changed files, rebuild caches when applicable, check relevant Drupal errors, run `git diff --check`, and inspect the final diff. Test both anonymous and authorized behavior when access permissions affect rendering.
