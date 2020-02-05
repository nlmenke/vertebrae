<template>
    <main id="locales" class="container">
        <div class="error" v-if="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="locales" class="table table-striped table-bordered table-hover">
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
                <tr v-for="locale in locales.data">
                    <td>{{ locale.code }}</td>
                    <td>{{ locale.native }}</td>
                    <td>{{ locale.language.name }}</td>
                    <td>{{ locale.script.name }}</td>
                    <td>{{ locale.active ? 'Yes' : 'No' }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination :data="locales" @pagination-change-page="getLocales" :limit=4 align="center"></pagination>
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
            getLocales(page = 1, callback) {
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
