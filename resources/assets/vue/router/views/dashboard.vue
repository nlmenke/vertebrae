<template>
    <div class="flex-center full-height position-ref">
        <div class="links top-right">
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

            <div class="m-b-md subtitle">
                Built with Laravel {{ laravelVersion }} and Vue {{ vueVersion }}
            </div>

            <div class="links m-b-md">
                <a :href="laravelDocsLink" target="_blank">Laradocs</a>
                <a href="https://github.com/nlmenke/vertebrae" target="_blank">GitHub</a>
            </div>

            <div class="badges">
                <a href="https://travis-ci.org/nlmenke/vertebrae" target="_blank"><img src="https://travis-ci.org/nlmenke/vertebrae.svg?branch=master" alt="travis-ci-build-status"></a>
                <a href="https://codecov.io/gh/nlmenke/vertebrae" target="_blank"><img src="https://codecov.io/gh/nlmenke/vertebrae/branch/master/graph/badge.svg" alt="codecov"></a>
                <a href="https://github.styleci.io/repos/153017543" target="_blank"><img src="https://github.styleci.io/repos/153017543/shield?style=flat" alt="style-ci"></a>
                <br>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/build-status/master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/build.png?b=master" alt="scrutinizer-build-status"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/coverage.png?b=master" alt="scrutinizer-code-coverage"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/quality-score.png?b=master" alt="scrutinizer-code-quality"></a>
                <br>
                <a href="https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md" target="_blank"><img src="https://img.shields.io/badge/license-MIT-428F7E.svg" alt="mit-license"></a>
            </div>

            <div class="contributors">
                Chiropractors:
                <div class="list-group list-group-flush">
                    <a
                        href="https://github.com/nlmenke"
                        class="list-group-item list-group-item-action"
                        target="_blank"
                    >nlmenke</a>
                    <a
                        href="https://github.com/dave9011"
                        class="list-group-item list-group-item-action"
                        target="_blank"
                    >dave9011</a>
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
                laravelDocsLink: null,
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
                        (response) => {
                            this.laravelVersion = response.data.laravel_version;
                            this.laravelDocsLink = 'https://laravel.com/docs/' + this.laravelVersion.split('.')[0] + '.x';
                        },
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
