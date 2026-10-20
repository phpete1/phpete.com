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
   - create a new branch off `main`,
   - commit the changes,
   - push the branch to `origin`,
   - open a pull request into `main` on GitHub with `gh pr create`.

## Conventions

To be added as the project takes shape.
