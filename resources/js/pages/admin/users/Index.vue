<script setup lang="ts">
// packages
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import debounce from 'lodash/debounce';
import { ArrowLeft, ArrowLeftToLine, ArrowRight, ArrowRightToLine, Lock, Pencil, Shield } from 'lucide-vue-next';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Select, SelectContent, SelectItem, SelectValue } from '@/components/ui/select';
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
        title: 'Users',
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

const search = debounce((term: string) => {
    router.get(
        page.props.users.path,
        term !== ''
            ? {
                  search: term,
              }
            : {},
    );
}, 500);

const setPageSize = (pageSize: number) => {
    router.get(page.props.users.path, {
        count: parseInt(pageSize),
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Users`" />

        <div class="w-full p-4">
            <div class="flex items-center py-4">
                <Input
                    class="max-w-sm"
                    :placeholder="`Search...`"
                    :model-value="page.props.search"
                    @update:model-value="search"
                />
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Name</TableHead>
                            <TableHead>Email Address</TableHead>
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
                                    :title="`Edit Roles`"
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
                                    :title="`Edit Permissions`"
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
                                    :title="`Edit`"
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
                        <p class="text-sm font-medium">Rows Per Page</p>
                        <Select
                            :model-value="page.props.users.per_page"
                            @update:model-value="setPageSize"
                        >
                            <Select-Trigger class="h-8 w-[70px]">
                                <SelectValue :placeholder="page.props.users.per_page.toString()" />
                            </Select-Trigger>
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
                    <div class="w- flex items-center justify-center text-sm font-medium">
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
