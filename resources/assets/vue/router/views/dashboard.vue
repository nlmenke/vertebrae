<template>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <RouterLink :to="{ path: 'countries' }">Countries</RouterLink>
            <RouterLink :to="{ path: 'currencies' }">Currencies</RouterLink>
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

    export default {
        computed: {
            laravelVersion() {
                return '5.7.28';
            },
            vueVersion() {
                return Vue.version;
            },
        },
    }
</script>
