# Vertebrae
Backbone for personal projects.

[![Build Status](https://travis-ci.org/nlmenke/vertebrae.svg?branch=master)](https://travis-ci.org/nlmenke/vertebrae)
[![codecov](https://codecov.io/gh/nlmenke/vertebrae/branch/master/graph/badge.svg)](https://codecov.io/gh/nlmenke/vertebrae)
[![StyleCI](https://github.styleci.io/repos/153017543/shield?style=flat)](https://github.styleci.io/repos/153017543)

[![Build Status](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master)

[![License](https://img.shields.io/badge/license-MIT-428F7E.svg)](https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md)

**Note**: If using npm, use `npm ci` command over `npm install` when running
automated environments such as test platforms, continuous integration, and
deployment. The command is useful for any time you wish to do a clean install
of your dependencies. See here for more: https://docs.npmjs.com/cli/ci

## Docker Quickstart
* copy the .env.example as .env
* update any values that need to be changed
  * `DB_HOST`, `DB_PASSWORD`, `REDIS_HOST`, `REDIS_PASSWORD`, and any variables
    below the Docker section heading that need to be updated for your project
    MUST be updated before your first docker up; a rebuild will be required if
    they are updated after
* ```
  docker-compose up -d
  ```
  * the first time this is run on a machine, it will build your docker
    containers and bring your environment up
    * the build will take some time, so go grab something to eat / drink
  * any time after will start up the environment
* build your app
* profit
