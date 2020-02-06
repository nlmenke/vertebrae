<template>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <RouterLink :to="{ path: 'countries' }">
                Countries
            </RouterLink>
            <RouterLink :to="{ path: 'currencies' }">
                Currencies
            </RouterLink>
            <RouterLink :to="{ path: 'languages' }">
                Languages
            </RouterLink>
            <RouterLink :to="{ path: 'locales' }">
                Locales
            </RouterLink>
        </div>

        <div class="content">
            <div class="title">
                Vertebrae
            </div>

            <div class="subtitle m-b-md">
                Built with Laravel {{ laravelVersion }} and Vue {{ vueVersion }}
            </div>

            <div class="links m-b-md">
                <a href="https://laravel.com/docs/6.x">Laradocs</a>
                <a href="https://github.com/nlmenke/vertebrae">GitHub</a>
            </div>

            <div class="badges">
                <a href="https://travis-ci.org/nlmenke/vertebrae"><img src="https://travis-ci.org/nlmenke/vertebrae.svg?branch=master" alt="travis-ci-build-status"></a>
                <a href="https://codecov.io/gh/nlmenke/vertebrae"><img src="https://codecov.io/gh/nlmenke/vertebrae/branch/master/graph/badge.svg" alt="codecov"></a>
                <a href="https://github.styleci.io/repos/153017543"><img src="https://github.styleci.io/repos/153017543/shield?style=flat" alt="style-ci"></a>
                <br>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/build-status/master"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/build.png?b=master" alt="scrutinizer-build-status"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/coverage.png?b=master" alt="scrutinizer-code-coverage"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/quality-score.png?b=master" alt="scrutinizer-code-quality"></a>
                <br>
                <a href="https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md"><img src="https://img.shields.io/badge/license-MIT-428F7E.svg" alt="mit-license"></a>
            </div>

            <div class="contributors">
                Chiropractors:
                <div class="list-group list-group-flush">
                    <a href="https://github.com/nlmenke" class="list-group-item list-group-item-action">nlmenke</a>
                    <a href="https://github.com/dave9011" class="list-group-item list-group-item-action">dave9011</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import axios from 'axios';

    export default {
        data() {
            return {
                error: null,
                languages: {},
                laravelVersion: null,
                vueVersion: Vue.version,
            };
        },
        mounted() {
            this.getEnvironment();
        },
        methods: {
            // TODO: save this data into the state
            getEnvironment() {
                axios.get('meta/environment')
                    .then(
                        response => (this.laravelVersion = response.data.laravel_version),
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
