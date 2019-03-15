<template>
    <div id="app" :class="{ 'laravel': isPath('/') }">
        <nav v-if="!isPath('/')" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <RouterLink :to="{ path: '/' }" class="navbar-brand">Vertebrae</RouterLink>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" :class="{ 'active': isPath('/countries') }">
                        <RouterLink :to="{ path: 'countries' }" class="nav-link">Countries</RouterLink>
                    </li>
                    <li class="nav-item" :class="{ 'active': isPath('/currencies') }">
                        <RouterLink :to="{ path: 'currencies' }" class="nav-link">Currencies</RouterLink>
                    </li>
                </ul>
            </div>
        </nav>

        <RouterView></RouterView>

        <footer v-if="!isPath('/')" class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2019 nlmenke</p>
        </footer>
    </div>
</template>

<script>
    export default {
        methods: {
            isPath(route) {
                return this.$route.path === route;
            },
        },
    }
</script>
