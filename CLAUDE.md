# phpete.com

New website for phpete.com.

## Repository

- GitHub: https://github.com/phpete1/phpete.com (public)
- Remote: `origin` → `git@github.com:phpete1/phpete.com.git`
- Local path: `~/Herd/phpetev2` (served by Laravel Herd)

## Stack

- Laravel 13 with Blade views + Tailwind CSS 4 via Vite
- **No** Livewire, **no** Inertia
- **No database**: sessions/cache use `file`, queue is `sync`; no migrations, models, factories or seeders
- **bun**, not npm: `bun install`, `bun run build`, `bun run dev` (never use npm/npx)
- PHP 8.5, run via **Laravel Sail** (`compose.yaml`, single `laravel.test` service, no extra services)
  - `./vendor/bin/sail up -d`, `sail artisan …`, `sail bun …`, `sail down`
  - Sail serves on port 80 by default; set `APP_PORT` if Herd is using it
- Dev: `composer dev` / `php artisan dev`; tests: `php artisan test`

## Workflow rules

1. **Every job ends in a pull request.** When given a task, automatically (without asking):
   - `git checkout main && git pull` so the branch starts from the latest `main`,
   - create a new branch off `main`,
   - commit the changes,
   - push the branch to `origin`,
   - open a pull request into `main` on GitHub with `gh pr create`.

2. **Every PR is atomic. Never stack branches.**
   - One task = one branch = one PR, always branched from `main` and targeting `main`.
   - Never branch off another feature/fix branch, even if its PR is still open. A PR must show only the commits for its own task.
   - If a task genuinely depends on unmerged work, stop and ask for that PR to be merged first instead of stacking.
   - A PR may contain several commits, as long as they all belong to the same task.

3. **Branch names** use a type prefix matching the commit convention: `feat/…`, `fix/…`, `docs/…`, `chore/…`, `build/…`, `refactor/…`, etc.

4. **Commit messages** follow Conventional Commits (`feat: …`, `fix: …`, `docs: …`); GrumPHP enforces this, plus Pint and Larastan, on every commit. Don't bypass the hooks (`--no-verify`) unless explicitly told to.

## Conventions

### Testing

- All tests use **Pest** (`pestphp/pest` with the Laravel plugin), never PHPUnit-style test classes.
- Write tests as closures, e.g.

  ```php
  test('the homepage shows the about page', function () {
      $this->get(route('home'))->assertOk();
  });
  ```

  not `public function test_something_works(): void { … }` methods on a `TestCase` class.
- Shared setup (base `TestCase`, traits) is applied in `tests/Pest.php` via `pest()->extend(...)->in(...)`, not per file.
