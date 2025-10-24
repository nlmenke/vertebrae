<script setup lang="ts">
// packages
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { ArrowLeft, ArrowLeftToLine, ArrowRight, ArrowRightToLine, Pencil } from 'lucide-vue-next';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import LanguageController from '@/actions/App/Http/Controllers/Admin/LanguageController';

import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Language, SharedData } from '@/types';

const page = usePage<SharedData>();
const languages = page.props.languages.data as Language[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Languages',
        href: LanguageController.index(),
    },
];

// pagination
const firstPage = 1;
const firstPageUrl = page.props.languages.first_page_url;
const previousPageUrl = page.props.languages.prev_page_url ?? firstPageUrl;
const currentPage = page.props.languages.current_page;
const lastPage = page.props.languages.last_page;
const lastPageUrl = page.props.languages.last_page_url;
const nextPageUrl = page.props.languages.next_page_url ?? lastPageUrl;

const setPageSize = (pageSize: string) => {
    router.get(page.props.languages.path, {
        count: parseInt(pageSize),
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Languages`" />

        <div class="w-full p-4">
            <div class="flex items-center py-4">
                <Link
                    v-if="can('create-languages')"
                    :href="LanguageController.create()"
                    class="ml-auto"
                >
                    <Button variant="default">Create</Button>
                </Link>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>ISO Alpha 2</TableHead>
                            <TableHead>ISO Alpha 3</TableHead>
                            <TableHead>Name</TableHead>
                            <TableHead></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="language in languages"
                            :key="language.id"
                        >
                            <TableCell class="h-4">
                                <code>{{ language.iso_alpha_2 }}</code>
                            </TableCell>
                            <TableCell>
                                <code>{{ language.iso_alpha_3 }}</code>
                            </TableCell>
                            <TableCell>{{ language.name }}</TableCell>
                            <TableCell class="text-right">
                                <Link
                                    v-if="can('edit-languages')"
                                    :href="LanguageController.edit(language)"
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
                            :model-value="page.props.languages.per_page"
                            @update:model-value="setPageSize"
                        >
                            <SelectTrigger class="h-8 w-[70px]">
                                <SelectValue :placeholder="page.props.languages.per_page.toString()" />
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
