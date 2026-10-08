---
name: gazda-drupal-workflow
description: Verify Gazda Drupal changes with minimal rediscovery.
version: 0.2.0
author: Gazdabolt maintainers, Hermes Agent
license: MIT
platforms: [linux]
metadata:
  hermes:
    tags: [drupal, gazda, cacheability, editing, verification]
    related_skills: [drupal-theme-development]
---

# Gazda Drupal Workflow

Use the project's shortest reliable paths for Gazda theme, front-page editing, configuration, cacheability, and maintenance-mode work. Keep discovery targeted, preserve content during probes, and prefer checked-in verification where one exists.

## When to Use

- Changing `web/themes/custom/gazda`.
- Changing query-backed front-page sections or their quick-edit links.
- Changing the Content editor role or exported permissions.
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
- Content editor config: `config/sync/user.role.content_editor.yml`
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

## Front-Page Content and Cacheability

- `gazda_preprocess_page()` queries published `discount`, `current_news`, `article`, and `customers_said` nodes plus `categories` taxonomy terms.
- Scalar values assembled in preprocess do not automatically carry entity cacheability to Internal Page Cache. Applying `CacheableMetadata` only to preprocess variables did not invalidate the cached front page.
- Keep route-limited list cache tags in `gazda_page_attachments_alter()`: the relevant node bundle list tags and the categories vocabulary list tag. Include the `user` cache context because edit links vary by account access.
- Do not disable page caching or call cache rebuild after content saves. Saving a relevant node or category must invalidate the primed front page through cache tags.
- A cache regression check must prime `/`, save one node through Drupal's entity API, request `/` without `drush cr`, assert the new value, restore it, and repeat for a category term. Put the probe in an OS temporary file and restore state in `finally`.

## Front-Page Quick Edit Pattern

- Only expose an edit URL after `$entity->access('update', NULL, TRUE)` succeeds. Anonymous users must receive zero `.gazda-quick-edit` links.
- Generate URLs from the entity's `edit-form` link template. Add Drupal's `destination` query option so successful submit returns to the homepage and its exact section.
- Every editable card needs a stable unique fragment target. Current conventions are `#introduction`, `#discount`, `#news`, `#category-{tid}`, `#actual-advice-{nid}`, and `#customer-review-{nid}`.
- Encode the fragment inside the `destination` query value through Drupal's `Url` API; never concatenate a raw `#fragment` onto the edit URL because browsers do not send that fragment to Drupal.
- Keep the link visually prominent but accessible: high-contrast pill styling, visible hover/focus/active states, a descriptive visually-hidden entity name, and reduced-motion handling.
- Verification requires: anonymous count `0`; Content editor count `18` for the current fixtures; every destination decodes to `/#fragment`; every fragment exists once in the returned DOM; all destinations are unique.

## Content Editor Permissions

- The role is `content_editor`; keep active configuration and `config/sync/user.role.content_editor.yml` identical.
- Current edit scope includes every node bundle (`article`, `current_news`, `customers_said`, `discount`, `page`), basic custom blocks, categories, and tags.
- Grant only the requested capability. “Edit all content” does not imply create or delete permissions.
- When adding dynamic permissions, include their calculated config/module dependencies in the exported role file. Compare `FileStorage('config/sync')->read('user.role.content_editor')` with active raw config after changing the role.
- Verify entity access using a real account carrying the role, not permission strings alone. Check one existing entity from every node bundle and one category term.

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
- A local edit-form HTTP 500 mentioning missing `core/modules/file/templates/file-upload-help.html.twig` is an installation/core-template problem, not a malformed quick-edit destination. Report it separately and do not modify core or vendor to mask it.
- A successful quick-link `href` check proves destination construction, not form submission. Request edit forms when the local installation is healthy; otherwise state the blocker explicitly.
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

For front-page editing or permission work, completion additionally requires:

- Query-backed content refreshes after entity save without manual cache rebuild.
- Anonymous and editor quick-link counts match access expectations.
- Every edit link returns to an existing unique front-page fragment.
- Active role configuration matches the exported YAML.
- All temporary content changes, users, servers, and verifier files are restored or removed.
