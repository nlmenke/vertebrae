<script setup lang="ts">
// packages
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import { index as UserControllerIndex } from '@/actions/App/Http/Controllers/Admin/UserController';
import UserPermissionController from '@/actions/App/Http/Controllers/Admin/UserPermissionController';

import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Permission, SharedData, User } from '@/types';

const page = usePage<SharedData>();
const authUser = page.props.auth.user as User;
const user = page.props.user as User;
const permissions = page.props.permissions as Permission[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('users.users', 2),
        href: UserControllerIndex(),
    },
    {
        title: wTrans('users.edit_permissions'),
        href: UserPermissionController.edit(user),
    },
];

const form = useForm({
    permissions: user.permissions,
});

permissions.map((permission) => {
    permission.checked = user.permissions.map((permission) => permission.slug).includes(permission.slug);

    return permission;
});

const submit = () => {
    if (user.roles.map((role) => role.slug).includes('admin')) {
        // the admin role already receives all permissions; no need to save them
        form.permissions = [];
    } else {
        form.permissions = permissions.filter((permission) => permission.checked);

        // remove permissions that are already assigned to the user's roles
        form.permissions = form.permissions.filter(
            (permission) =>
                !(
                    user.roles.map((role) => role.permissions.map((rolePermission) => rolePermission.slug)).shift() ??
                    []
                ).includes(permission.slug),
        );
    }

    form.patch(UserPermissionController.update(user));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="wTrans('users.edit_permissions').value" />

        <div class="w-full space-y-6 p-4">
            <form
                class="space-y-4"
                @submit.prevent="submit"
            >
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead></TableHead>
                            <TableHead>{{ wTransChoice('permissions.permissions', 1) }}</TableHead>
                            <TableHead>{{ wTrans('permissions.fields.description') }}</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="permission in permissions"
                            :key="permission.id"
                        >
                            <TableCell>
                                <Checkbox
                                    :id="`permission-${permission.id}`"
                                    v-model="permission.checked"
                                    :disabled="
                                        user.roles.map((role) => role.slug).includes('admin') ||
                                        (
                                            user.roles
                                                .map((role) =>
                                                    role.permissions.map((rolePermission) => rolePermission.slug),
                                                )
                                                .shift() ?? []
                                        ).includes(permission.slug) ||
                                        !authUser.permission_list.includes(permission.slug)
                                    "
                                />
                            </TableCell>
                            <TableCell>{{ permission.name }}</TableCell>
                            <TableCell>{{ permission.description }}</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>

                <div class="flex items-center">
                    <Button :disabled="form.processing">
                        {{ wTrans('common.button.save') }}
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
