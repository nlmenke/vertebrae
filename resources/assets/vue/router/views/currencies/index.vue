<template>
    <main id="currencies" class="container">
        <div class="error" v-if="error">
            <p>{{ error }}</p>
        </div>

        <div class="table-responsive">
            <table v-if="currencies" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ISO Alpha</th>
                        <th>ISO Numeric</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Decimal Precision</th>
                        <th>Exchange Rate</th>
                        <th># Countries</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="currency in currencies">
                        <td>{{ currency.iso_alpha }}</td>
                        <td>{{ currency.iso_numeric }}</td>
                        <td>{{ currency.name }}</td>
                        <td>{{ currency.symbol }}</td>
                        <td>{{ currency.decimal_precision }}</td>
                        <td>{{ currency.exchange_rate }}</td>
                        <td>{{ currency.countries.length }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <ul v-if="hasPages" class="pagination justify-content-center">
            <li v-if="getPrevPage" class="page-item"><a class="page-link" @click.prevent="goToPage(getPrevPage)" href="#">&lsaquo;</a></li>
            <li v-if="!getPrevPage" class="page-item disabled"><span class="page-link">&lsaquo;</span></li>

            <li v-for="page in getPagination" class="page-item" :class="{ active: onPage(page), disabled: page === '...' }">
                <span v-if="onPage(page) || page === '...'" class="page-link">{{ page }}</span>
                <a v-if="!onPage(page) && page !== '...'" class="page-link" @click.prevent="goToPage(page)" href="#">{{ page }}</a>
            </li>

            <li v-if="getNextPage" class="page-item"><a class="page-link" @click.prevent="goToPage(getNextPage)" href="#">&rsaquo;</a></li>
            <li v-if="!getNextPage" class="page-item disabled"><span class="page-link">&rsaquo;</span></li>
        </ul>
    </main>
</template>

<script>
    import axios from 'axios';

    const getCurrencies = (page, callback) => {
        const params = {
            page
        };

        axios.get('v1/currencies', { params })
            .then(response => {
                callback(response.data);
            })
            .catch(error => {
                callback(error.response.data, error);
            });
    };

    export default {
        data() {
            return {
                currencies: null,
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            };
        },
        computed: {
            getFirstPage() {
                return 1;
            },
            getLastPage() {
                if (!this.meta) {
                    return this.getFirstPage();
                }

                return this.meta.last_page;
            },
            getNextPage() {
                if (!this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }

                return this.meta.current_page + 1;
            },
            getPagination() {
                if (!this.meta) {
                    return;
                }

                let pages = [];
                for (let page = this.getFirstPage; page <= this.getLastPage; page++) {
                    if (
                        page === this.getFirstPage ||
                        page === this.meta.current_page - 2 ||
                        page === this.meta.current_page - 1 ||
                        page === this.meta.current_page ||
                        page === this.meta.current_page + 1 ||
                        page === this.meta.current_page + 2 ||
                        page === this.getLastPage
                    ) {
                        pages.push(page);
                    }

                    if (!pages.includes(page) && !pages.includes('...', -1)) {
                        pages.push('...');
                    }
                }

                return pages;
            },
            getPrevPage() {
                if (!this.meta || this.meta.current_page === 1) {
                    return;
                }

                return this.meta.current_page - 1;
            },
            hasPages() {
                return (this.meta && this.getFirstPage !== this.getLastPage);
            },
        },
        beforeRouteEnter(to, from, next) {
            getCurrencies(to.query.page, (data, error) => {
                next(vm => vm.setData(data, error));
            });
        },
        beforeRouteUpdate(to, from, next) {
            this.currencies = this.links = this.meta = null;

            getCurrencies(to.query.page, (data, error) => {
                this.setData(data, error);

                next();
            });
        },
        methods: {
            goToPage(page) {
                this.$router.push({
                    query: {
                        page: page,
                    }
                });
            },
            onPage(page) {
                return (!this.meta || this.meta.current_page === page);
            },
            setData({ data: currencies, links, meta }, error) {
                if (error) {
                    this.error = error.toString();
                } else {
                    this.currencies = currencies;
                    this.links = links;
                    this.meta = meta;
                }
            },
        },
    }
</script>
