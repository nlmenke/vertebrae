<template>
    <main id="countries" class="container">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="countries" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ISO Alpha 2</th>
                        <th>ISO Alpha 3</th>
                        <th>ISO Numeric</th>
                        <th>Name</th>
                        <th>Currency</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="country in countries.data" :key="country.id">
                        <td>{{ country.iso_alpha_2 }}</td>
                        <td>{{ country.iso_alpha_3 }}</td>
                        <td>{{ country.iso_numeric }}</td>
                        <td>{{ country.name }}</td>
                        <td>{{ country.currency ? country.currency.iso_alpha : null }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <pagination
            :data="countries"
            :limit="4"
            align="center"
            @pagination-change-page="getCountries"
        ></pagination>
    </main>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                countries: {},
                error: null,
            };
        },
        mounted() {
            this.getCountries();
        },
        methods: {
            getCountries(page = 1, callback) {
                const params = {
                    page,
                };

                axios.get('v1/countries', { params })
                    .then(
                        response => (this.countries = response.data),
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
