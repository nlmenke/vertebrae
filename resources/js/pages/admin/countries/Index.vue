<script setup lang="ts">
// packages
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
import { ArrowLeft, ArrowLeftToLine, ArrowRight, ArrowRightToLine, Pencil } from 'lucide-vue-next';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import CountryController from '@/actions/App/Http/Controllers/Admin/CountryController';

import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Country, SharedData } from '@/types';

const page = usePage<SharedData>();
const countries = page.props.countries.data as Country[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('countries.countries', 2),
        href: CountryController.index(),
    },
];

// pagination
const firstPage = 1;
const firstPageUrl = page.props.countries.first_page_url;
const previousPageUrl = page.props.countries.prev_page_url ?? firstPageUrl;
const currentPage = page.props.countries.current_page;
const lastPage = page.props.countries.last_page;
const lastPageUrl = page.props.countries.last_page_url;
const nextPageUrl = page.props.countries.next_page_url ?? lastPageUrl;

const setPageSize = (pageSize: string) => {
    router.get(page.props.countries.path, {
        count: parseInt(pageSize),
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="wTransChoice('countries.countries', 2).value" />

        <div class="w-full p-4">
            <div class="flex items-center py-4">
                <Link
                    v-if="can('create-countries')"
                    :href="CountryController.create()"
                    class="ml-auto"
                >
                    <Button variant="default">{{ wTrans('common.button.create') }}</Button>
                </Link>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>{{ wTrans('countries.fields.iso_alpha_2') }}</TableHead>
                            <TableHead>{{ wTrans('countries.fields.iso_alpha_3') }}</TableHead>
                            <TableHead>{{ wTrans('countries.fields.iso_numeric') }}</TableHead>
                            <TableHead>{{ wTrans('countries.fields.name') }}</TableHead>
                            <TableHead>{{ wTransChoice('currencies.currencies', 1) }}</TableHead>
                            <TableHead></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="country in countries"
                            :key="country.id"
                        >
                            <TableCell class="h-4">
                                <code>{{ country.iso_alpha_2 }}</code>
                            </TableCell>
                            <TableCell>
                                <code>{{ country.iso_alpha_3 }}</code>
                            </TableCell>
                            <TableCell>
                                <code>{{ country.iso_numeric }}</code>
                            </TableCell>
                            <TableCell>{{ country.name }}</TableCell>
                            <TableCell>
                                {{
                                    country.currency
                                        ? country.currency.name + ' (' + country.currency.iso_alpha + ')'
                                        : ''
                                }}
                            </TableCell>
                            <TableCell class="text-right">
                                <Link
                                    v-if="can('edit-countries')"
                                    :href="CountryController.edit(country)"
                                    :title="wTrans('common.button.edit').value"
                                >
                                    <Button
                                        variant="ghost"
                                        class="size-4 text-blue-400 transition-colors hover:text-blue-600 dark:text-blue-300 hover:dark:text-blue-100"
                                    >
                                        <Pencil />
                                    </Button>
                                </Link>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>

            <div class="flex items-center justify-end space-x-2 py-4">
                <div class="flex items-center space-x-6 lg:space-x-8">
                    <div class="flex items-center space-x-2">
                        <p class="text-sm font-medium">{{ wTrans('pagination.per_page') }}</p>
                        <Select
                            :model-value="page.props.countries.per_page"
                            @update:model-value="setPageSize"
                        >
                            <SelectTrigger class="h-8 w-[70px]">
                                <SelectValue :placeholder="page.props.countries.per_page.toString()" />
                            </SelectTrigger>
                            <SelectContent side="top">
                                <SelectItem
                                    v-for="pageSize in [10, 25, 50]"
                                    :key="pageSize"
                                    :value="pageSize"
                                >
                                    {{ pageSize }}
                                </SelectItem>
                            </SelectContent>
                        </Select>
                    </div>
                    <div class="flex w-[100px] items-center justify-center text-sm font-medium">
                        {{
                            wTrans('pagination.page', {
                                current: currentPage,
                                total: lastPage,
                            })
                        }}
                    </div>
                    <div class="flex items-center space-x-2">
                        <Link :href="firstPageUrl">
                            <Button
                                variant="outline"
                                class="hidden h-8 w-8 p-0 lg:flex"
                                :disabled="currentPage === firstPage"
                            >
                                <span class="sr-only">{{ wTrans('pagination.first_page') }}</span>
                                <ArrowLeftToLine class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="previousPageUrl">
                            <Button
                                variant="outline"
                                class="h-8 w-8 p-0"
                                :disabled="currentPage === firstPage"
                            >
                                <span class="sr-only">{{ wTrans('pagination.previous_page') }}</span>
                                <ArrowLeft class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="nextPageUrl">
                            <Button
                                variant="outline"
                                class="h-8 w-8 p-0"
                                :disabled="currentPage === lastPage"
                            >
                                <span class="sr-only">{{ wTrans('pagination.next_page') }}</span>
                                <ArrowRight class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="lastPageUrl">
                            <Button
                                variant="outline"
                                class="hidden h-8 w-8 p-0 lg:flex"
                                :disabled="currentPage === lastPage"
                            >
                                <span class="sr-only">{{ wTrans('pagination.last_page') }}</span>
                                <ArrowRightToLine class="h-4 w-4" />
                            </Button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
