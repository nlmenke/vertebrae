# Branching

All features should be based off the `develop` branch. Since the purpose of
this repository is to be the starting point of larger projects, everything will
be merged into `main` shortly after it is approved and merged into `develop`;
this may change some day, but for now, `develop` should be the base for
anything new.

Bugfixes depend on the severity of the bug. If a bug requires an immediate fix,
a branch should be created from the `main` branch and a pull request made
directly to `main`. This will be merged back up the pipeline once released.
Less urgent bugfixes can be handled similarly to any other ticket and will be
released as part of the usual flow.
