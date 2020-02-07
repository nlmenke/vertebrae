<template>
    <main id="locales" class="container">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="locales" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Language (Native)</th>
                        <th>Language (English)</th>
                        <th>Script</th>
                        <th>Active?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="locale in locales.data" :key="locale.id">
                        <td>{{ locale.code }}</td>
                        <td>{{ locale.native }}</td>
                        <td>{{ locale.language.name }}</td>
                        <td>{{ locale.script.name }}</td>
                        <td>{{ locale.active ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <pagination
            :data="locales"
            :limit="4"
            align="center"
            @pagination-change-page="getLocales"
        ></pagination>
    </main>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                error: null,
                locales: {},
            };
        },
        mounted() {
            this.getLocales();
        },
        methods: {
            getLocales(page = 1) {
                const params = {
                    page,
                };

                axios.get('v1/locales', { params })
                    .then(
                        response => (this.locales = response.data),
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
