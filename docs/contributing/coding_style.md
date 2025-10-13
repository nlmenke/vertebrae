# Coding Style

For PHP, we are folling the standards set in the
["laravel" preset][pint-laravel-preset] for Laravel Pint with a few overrides
(see [pint.json](/pint.json) for details).

For the frontend, we're using the default ESLint and Prettier configs from a
fresh Laravel (`laravel/vue-starter-kit`) installation (see
[eslint.config.js](/eslint.config.js) and [.prettierrc](/.prettierrc.js) for
details).

> Rules for these tools may be updated in the future, so be sure to test before
> submitting a PR.

There is a full testing suite that can be run with: `composer test` which will
run when a PR is opened or updated. This suite includes unit tests as well as
linting tests; they do not lint the codebase. If you wish to fix any linting
errors, you can run the following commands:
- `composer lint` - runs all linters
- `npm run lint` - runs ESLint
- `npm run format` - runs Prettier


[pint-laravel-preset]: https://github.com/laravel/pint/blob/main/resources/presets/laravel.php
