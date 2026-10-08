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

## Testing and verification policy

The user performs final testing and visual or functional review manually. This policy overrides any automatic testing or verification guidance elsewhere in this file, including use of the maintenance-mode verifier, unless the user explicitly requests that verification.

### Default development behavior

- Do not use test-driven development unless the user explicitly asks for it.
- Do not automatically create automated tests or modify existing test files.
- Do not run existing test suites unless explicitly requested.
- Do not create ad-hoc verification scripts, including temporary Python, PHP, shell, or browser-based verifier scripts, merely to validate your own changes.
- Do not spend time on dogfood, browser validation, visual regression testing, or extensive self-verification unless explicitly requested.
- Do not inspect test files merely because they exist; inspect them only when directly necessary to understand the implementation.
- For normal development work—especially Drupal theming, Twig, CSS, JavaScript, frontend layout, visual design, and small PHP changes—implement the requested change directly.
- Assume the user will test the result manually in the browser or application.

### Allowed lightweight safety checks

Perform only fast checks needed to prevent obvious breakage, such as:

- Syntax checks.
- Obvious PHP fatal-error checks.
- Malformed YAML or Twig detection when relevant.
- Cache rebuilds when required for Drupal to discover or render a change.
- `git diff --check` and review of the final diff.

Do not build custom verification harnesses.

### Completion report

After implementation, clearly summarize:

1. What changed.
2. Which files changed.
3. What the user should manually check.

For security-critical, destructive, database-schema, deployment, migration, or similarly high-risk changes, warn that testing is advisable, but do not automatically run extensive tests unless explicitly requested.
