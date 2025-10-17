WordpressApiBundle — Development and Composer usage

When developing this bundle inside a Symfony application (using a path repository), you generally do NOT run `composer install` inside the bundle directory. Instead, manage all dependencies from the application root.

Why?
- The app’s root composer.json already declares this bundle as a path repository:
  - It installs the bundle in development via symlink and resolves dependencies once at the app level.
- Running `composer install` inside the bundle would create a nested vendor directory and duplicate/autoload conflicts.

Recommended workflows

1) Developing the bundle inside a host app (path repository)
- Use the root composer.json only:
  - Add/update dependencies with: `composer require ...` (from the app root)
  - Install/update: `composer install` / `composer update` (from the app root)
- Do not run composer in bundles/WordpressApiBundle.

2) Developing the bundle standalone (outside an app)
- If you check out this bundle into its own repository and work on it alone, then run `composer install` in the bundle directory to get the bundle’s dev tools and its minimal dependencies.

Housekeeping
- The bundle’s .gitignore ignores its own vendor directory and composer.lock to avoid committing nested dependencies when used inside an application.

FAQ
- Q: Do I need to `composer install` inside the bundle?
  - A: No, not when the bundle is developed inside an application via a path repository. Yes, only if you work on the bundle as a standalone package outside any host app.
