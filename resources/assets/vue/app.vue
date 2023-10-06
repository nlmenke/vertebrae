<template>
    <div id="app" :class="{ 'laravel': isHomeRoute() }">
        <nav v-if="!isHomeRoute()" class="bg-dark fixed-top navbar navbar-dark navbar-expand-md">
            <RouterLink :to="{ path: '/' }" class="navbar-brand">
                Vertebrae
            </RouterLink>

            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbar"
                aria-controls="navbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="mr-auto navbar-nav">
                    <li class="nav-item">
                        <RouterLink :to="{ path: 'countries' }" class="nav-link">
                            Countries
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink :to="{ path: 'currencies' }" class="nav-link">
                            Currencies
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink :to="{ path: 'languages' }" class="nav-link">
                            Languages
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink :to="{ path: 'locales' }" class="nav-link">
                            Locales
                        </RouterLink>
                    </li>
                </ul>
            </div>
        </nav>

        <RouterView></RouterView>

        <footer v-if="!isHomeRoute()" class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>
                &copy; 2018-2020 <a href="/">n.l.menke</a>
            </p>
        </footer>
    </div>
</template>

<script>
    export default {
        methods: {
            isHomeRoute() {
                return this.$route.name === 'dashboard';
            },
        },
    };
</script>
