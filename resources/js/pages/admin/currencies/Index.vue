<script setup lang="ts">
// packages
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { ArrowLeft, ArrowLeftToLine, ArrowRight, ArrowRightToLine, Pencil } from 'lucide-vue-next';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import CurrencyController from '@/actions/App/Http/Controllers/Admin/CurrencyController';

import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Currency, SharedData } from '@/types';

const page = usePage<SharedData>();
const currencies = page.props.currencies.data as Currency[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Currencies',
        href: CurrencyController.index(),
    },
];

// pagination
const firstPage = 1;
const firstPageUrl = page.props.currencies.first_page_url;
const previousPageUrl = page.props.currencies.prev_page_url ?? firstPageUrl;
const currentPage = page.props.currencies.current_page;
const lastPage = page.props.currencies.last_page;
const lastPageUrl = page.props.currencies.last_page_url;
const nextPageUrl = page.props.currencies.next_page_url ?? lastPageUrl;

const setPageSize = (pageSize: string) => {
    router.get(page.props.currencies.path, {
        count: parseInt(pageSize),
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Currencies`" />

        <div class="w-full p-4">
            <div class="flex items-center py-4">
                <Link
                    v-if="can('create-currencies')"
                    :href="CurrencyController.create()"
                    class="ml-auto"
                >
                    <Button variant="default">Create</Button>
                </Link>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>ISO Alpha</TableHead>
                            <TableHead>ISO Numeric</TableHead>
                            <TableHead>Name</TableHead>
                            <TableHead>Symbol</TableHead>
                            <TableHead>Decimal Precision</TableHead>
                            <TableHead>Exchange Rate</TableHead>
                            <TableHead></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="currency in currencies"
                            :key="currency.id"
                        >
                            <TableCell>
                                <code>{{ currency.iso_alpha }}</code>
                            </TableCell>
                            <TableCell>
                                <code>{{ currency.iso_numeric }}</code>
                            </TableCell>
                            <TableCell>{{ currency.name }}</TableCell>
                            <TableCell>{{ currency.symbol }}</TableCell>
                            <TableCell>{{ currency.decimal_precision }}</TableCell>
                            <TableCell>{{ currency.exchange_rate }}</TableCell>
                            <TableCell class="h-4 text-right">
                                <Link
                                    v-if="can('edit-currencies')"
                                    :href="CurrencyController.edit(currency)"
                                    :title="`Edit`"
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
                        <p class="text-sm font-medium">Rows Per Page</p>
                        <Select
                            :model-value="page.props.currencies.per_page"
                            @update:model-value="setPageSize"
                        >
                            <SelectTrigger class="h-8 w-[70px]">
                                <SelectValue :placeholder="page.props.currencies.per_page.toString()" />
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
                        Page {{ currentPage }} of {{ lastPage }}
                    </div>
                    <div class="flex items-center space-x-2">
                        <Link :href="firstPageUrl">
                            <Button
                                variant="outline"
                                class="hidden h-8 w-8 p-0 lg:flex"
                                :disabled="currentPage === firstPage"
                            >
                                <span class="sr-only">First Page</span>
                                <ArrowLeftToLine class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="previousPageUrl">
                            <Button
                                variant="outline"
                                class="h-8 w-8 p-0"
                                :disabled="currentPage === firstPage"
                            >
                                <span class="sr-only">Previous Page</span>
                                <ArrowLeft class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="nextPageUrl">
                            <Button
                                variant="outline"
                                class="h-8 w-8 p-0"
                                :disabled="currentPage === lastPage"
                            >
                                <span class="sr-only">Next Page</span>
                                <ArrowRight class="h-4 w-4" />
                            </Button>
                        </Link>
                        <Link :href="lastPageUrl">
                            <Button
                                variant="outline"
                                class="hidden h-8 w-8 p-0 lg:flex"
                                :disabled="currentPage === lastPage"
                            >
                                <span class="sr-only">Last Page</span>
                                <ArrowRightToLine class="h-4 w-4" />
                            </Button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
