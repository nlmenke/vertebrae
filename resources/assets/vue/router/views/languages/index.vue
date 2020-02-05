<template>
    <main id="languages" class="container">
        <div class="error" v-if="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="languages" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>ISO Alpha 2</th>
                    <th>ISO Alpha 3</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="language in languages.data">
                    <td>{{ language.iso_alpha_2 }}</td>
                    <td>{{ language.iso_alpha_3 }}</td>
                    <td>{{ language.name }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination :data="languages" @pagination-change-page="getLanguages" :limit=4 align="center"></pagination>
    </main>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                error: null,
                languages: {},
            };
        },
        mounted() {
            this.getLanguages();
        },
        methods: {
            getLanguages(page = 1, callback) {
                const params = {
                    page,
                };

                axios.get('v1/languages', { params })
                    .then(
                        response => (this.languages = response.data),
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
