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
                    <th>ISO Numeric</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="language in languages">
                    <td>{{ language.iso_alpha_2 }}</td>
                    <td>{{ language.iso_alpha_3 }}</td>
                    <td>{{ language.iso_numeric }}</td>
                    <td>{{ language.name }}</td>
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

    const getLanguages = (page, callback) => {
        const params = {
            page
        };

        axios.get('v1/languages', { params })
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
                languages: null,
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
            getLanguages(to.query.page, (data, error) => {
                next(vm => vm.setData(data, error));
            });
        },
        beforeRouteUpdate(to, from, next) {
            this.languages = this.links = this.meta = null;

            getLanguages(to.query.page, (data, error) => {
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
            setData({ data: languages, links, meta }, error) {
                if (error) {
                    this.error = error.toString();
                } else {
                    this.languages = languages;
                    this.links = links;
                    this.meta = meta;
                }
            },
        },
    }
</script>
