<script setup lang="ts">
// packages
import { Head, useForm, usePage } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
// generated (wayfinder)
import { index as UserControllerIndex } from '@/actions/App/Http/Controllers/Admin/UserController';
import UserRoleController from '@/actions/App/Http/Controllers/Admin/UserRoleController';

import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Role, SharedData, User } from '@/types';

const page = usePage<SharedData>();
const authUser = page.props.auth.user as User;
const user = page.props.user as User;
const roles = page.props.roles as Role[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: UserControllerIndex(),
    },
    {
        title: 'Edit Roles  (' + user.name + ')',
        href: UserRoleController.edit(user),
    },
];

const form = useForm({
    roles: user.roles,
});

roles.map((role) => {
    role.checked = user.roles.map((role) => role.slug).includes(role.slug);

    return role;
});

const submit = () => {
    form.roles = roles.filter((role) => role.checked);

    form.patch(UserRoleController.update(user));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Edit Roles for ${user.name}`" />

        <div class="w-full space-y-6 p-4">
            <form
                @submit.prevent="submit"
                class="space-y-4"
            >
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead></TableHead>
                            <TableHead>Role</TableHead>
                            <TableHead>Description</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="role in roles"
                            :key="role.id"
                        >
                            <TableCell>
                                <Checkbox
                                    :id="`role-${role.id}`"
                                    v-model="role.checked"
                                    :disabled="
                                        role.slug === 'admin' &&
                                        !authUser.roles.map((role) => role.slug).includes('admin')
                                    "
                                />
                            </TableCell>
                            <TableCell>{{ role.name }}</TableCell>
                            <TableCell>{{ role.description }}</TableCell>
                        </TableRow>
                    </TableBody>
                </Table>

                <div class="flex items-center">
                    <Button :disabled="form.processing">Save</Button>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p
                            v-show="form.recentlySuccessful"
                            class="text-sm text-neutral-600"
                        >
                            Saved.
                        </p>
                    </Transition>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
