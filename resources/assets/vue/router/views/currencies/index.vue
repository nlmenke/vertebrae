<template>
    <main id="currencies" class="container">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="currencies" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ISO Alpha</th>
                        <th>ISO Numeric</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Decimal Precision</th>
                        <th>Exchange Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="currency in currencies.data" :key="currency.id">
                        <td>{{ currency.iso_alpha }}</td>
                        <td>{{ currency.iso_numeric }}</td>
                        <td>{{ currency.name }}</td>
                        <td>{{ currency.symbol }}</td>
                        <td>{{ currency.decimal_precision }}</td>
                        <td>{{ currency.exchange_rate }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <pagination
            :data="currencies"
            :limit="4"
            align="center"
            @pagination-change-page="getCurrencies"
        ></pagination>
    </main>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                currencies: {},
                error: null,
            };
        },
        mounted() {
            this.getCurrencies();
        },
        methods: {
            getCurrencies(page = 1, callback) {
                const params = {
                    page,
                };

                axios.get('v1/currencies', { params })
                    .then(
                        response => (this.currencies = response.data),
                        error => (this.error = error.toString())
                    );
            },
        },
    };
</script>
