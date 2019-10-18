<template>
    <main id="languages" class="container">
        <div class="input-group mb-3">
            <input type="text" v-model="search_term" @keyup.enter="onSearch" class="form-control" placeholder="Search...">
        </div>

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
                languages: {},
                error: null,
                search_term: null,
            };
        },
        mounted() {
            this.getLanguages();
        },
        methods: {
            getLanguages(page = 1, callback) {
                const params = {
                    page
                };

                let route = 'v1/languages';

                if (this.search_term) {
                    route = 'v1/languages/search';
                    params.search_term = this.search_term;
                }

                axios.get(route, { params })
                    .then(
                        response => {
                            this.languages = response.data;
                            this.error = null;
                        },
                        error => this.error = error.toString()
                    );
            },
            onSearch($event) {
                this.getLanguages(1);
            }
        },
    }
</script>
