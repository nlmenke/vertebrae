<template>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <RouterLink :to="{ path: 'countries' }">Countries</RouterLink>
            <RouterLink :to="{ path: 'currencies' }">Currencies</RouterLink>
            <RouterLink :to="{ path: 'languages' }">Languages</RouterLink>
            <RouterLink :to="{ path: 'locales' }">Locales</RouterLink>
        </div>

        <div class="content">
            <div class="title">
                Vertebrae
            </div>

            <div class="subtitle m-b-md">
                Built with Laravel {{ laravelVersion }} and Vue {{ vueVersion }}
            </div>

            <div class="links m-b-md">
                <a href="https://laravel.com/docs/5.7">Laradocs</a>
                <a href="https://github.com/nlmenke/vertebrae">GitHub</a>
            </div>

            <div class="badges">
                <a href="https://travis-ci.org/nlmenke/vertebrae"><img src="https://travis-ci.org/nlmenke/vertebrae.svg" alt="travis-ci"></a>
                <a href="https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md"><img src="https://img.shields.io/badge/license-MIT-428F7E.svg" alt="mit-license"></a>
            </div>

            <div class="contributors">
                Chiropractors: <a href="https://github.com/nlmenke">nlmenke</a>
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
                languages: {},
                error: null,
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
                        response => this.laravelVersion = response.data.laravel_version,
                        error => this.error = error.toString()
                    );
            }
        },
    }
</script>
