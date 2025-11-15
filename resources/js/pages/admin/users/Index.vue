<script setup lang="ts">
// packages
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
import { ArrowLeft, ArrowLeftToLine, ArrowRight, ArrowRightToLine, Lock, Pencil, Shield } from 'lucide-vue-next';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import UserController from '@/actions/App/Http/Controllers/Admin/UserController';
import UserPermissionController from '@/actions/App/Http/Controllers/Admin/UserPermissionController';
import UserRoleController from '@/actions/App/Http/Controllers/Admin/UserRoleController';

import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, SharedData, User } from '@/types';

const page = usePage<SharedData>();
const users = page.props.users.data as User[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('users.users', 2),
        href: UserController.index(),
    },
];

// pagination
const firstPage = 1;
const firstPageUrl = page.props.users.first_page_url;
const previousPageUrl = page.props.users.prev_page_url ?? firstPageUrl;
const currentPage = page.props.users.current_page;
const lastPage = page.props.users.last_page;
const lastPageUrl = page.props.users.last_page_url;
const nextPageUrl = page.props.users.next_page_url ?? lastPageUrl;

const setPageSize = (pageSize: number) => {
    router.get(page.props.users.path, {
        count: parseInt(pageSize),
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="wTransChoice('users.users', 2).value" />

        <div class="w-full p-4">
            <div class="flex items-center py-4"></div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>{{ wTrans('users.fields.name') }}</TableHead>
                            <TableHead>{{ wTrans('users.fields.email') }}</TableHead>
                            <TableHead></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="user in users"
                            :key="user.id"
                        >
                            <TableCell>{{ user.name }}</TableCell>
                            <TableCell>{{ user.email }}</TableCell>
                            <TableCell class="h-4 text-right">
                                <Link
                                    v-if="can('edit-user-roles')"
                                    :href="UserRoleController.edit(user)"
                                    :title="
                                        wTrans('common.edit', {
                                            value: wTransChoice('roles.roles', 2).value,
                                        }).value
                                    "
                                >
                                    <Button
                                        variant="ghost"
                                        class="size-4 text-purple-400 transition-colors hover:text-purple-400 dark:text-purple-300 dark:hover:text-purple-100"
                                    >
                                        <Shield />
                                    </Button>
                                </Link>
                                <Link
                                    v-if="can('edit-user-permissions')"
                                    :href="UserPermissionController.edit(user)"
                                    :title="
                                        wTrans('common.edit', {
                                            value: wTransChoice('permissions.permissions', 2).value,
                                        }).value
                                    "
                                >
                                    <Button
                                        variant="ghost"
                                        class="size-4 text-yellow-400 transition-colors hover:text-yellow-400 dark:text-yellow-300 dark:hover:text-yellow-100"
                                    >
                                        <Lock />
                                    </Button>
                                </Link>
                                <Link
                                    v-if="can('edit-users')"
                                    :href="UserController.edit(user)"
                                    :title="wTrans('common.button.edit').value"
                                >
                                    <Button
                                        variant="ghost"
                                        class="size-4 text-blue-400 transition-colors hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-100"
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
                            :model-value="page.props.users.per_page"
                            @update:model-value="setPageSize"
                        >
                            <SelectTrigger class="h-8 w-[70px]">
                                <SelectValue :placeholder="page.props.users.per_page.toString()" />
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
