# Vertebrae

Backbone for personal projects.

[![codecov](https://codecov.io/gh/nlmenke/vertebrae/branch/master/graph/badge.svg)](https://codecov.io/gh/nlmenke/vertebrae)

[![Build Status](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master)
[![Code Quality](https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master)

[![License](https://img.shields.io/badge/license-MIT-428F7E.svg)](LICENSE.md)

[![Hacktoberfest 2018](https://img.shields.io/badge/hacktoberfest_2018-is_over!_(7_PRs_opened)-FE7D37?logo=digitalocean&logoColor=white)](https://github.com/nlmenke/vertebrae/pulls?q=created:2018-10-01..2018-10-31)
[![Hacktoberfest 2019](https://img.shields.io/github/hacktoberfest/2019/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202019)](https://github.com/nlmenke/vertebrae/pulls?q=created:2019-10-01..2019-10-31)
[![Hacktoberfest 2020](https://img.shields.io/github/hacktoberfest/2020/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202020)](https://github.com/nlmenke/vertebrae/pulls?q=created:2020-10-01..2020-10-31)
[![Hacktoberfest 2021](https://img.shields.io/github/hacktoberfest/2021/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202021)](https://github.com/nlmenke/vertebrae/pulls?q=created:2021-10-01..2021-10-31)
[![Hacktoberfest 2022](https://img.shields.io/github/hacktoberfest/2022/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202022)](https://github.com/nlmenke/vertebrae/pulls?q=created:2022-10-01..2022-10-31)
[![Hacktoberfest 2023](https://img.shields.io/github/hacktoberfest/2023/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202023)](https://github.com/nlmenke/vertebrae/pulls?q=created:2023-10-01..2023-10-31)
[![Hacktoberfest 2024](https://img.shields.io/github/hacktoberfest/2024/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202024)](https://github.com/nlmenke/vertebrae/pulls?q=created:2024-10-01..2024-10-31)
[![Hacktoberfest 2025](https://img.shields.io/github/hacktoberfest/2025/nlmenke/vertebrae?logo=digitalocean&logoColor=white&label=hacktoberfest%202025)](https://github.com/nlmenke/vertebrae/pulls?q=created:2025-10-01..2025-10-31)

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


## Contributing

Thank you for considering contributing to this project. The contribution guide
can be found in the project's [documentation](docs/contributing).


## License

This project is open-sourced software licensed under the MIT license.
