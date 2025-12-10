<script setup lang="ts">
// packages
import { Head, useForm, usePage } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { Textarea } from '@/components/ui/textarea';
// generated (wayfinder)
import RoleController from '@/actions/App/Http/Controllers/Admin/RoleController';

import InputError from '@/components/InputError.vue';
import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Permission, SharedData } from '@/types';

const page = usePage<SharedData>();
const permissions = page.props.permissions as Permission[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Roles',
        href: RoleController.index(),
    },
    {
        title: 'Create',
        href: RoleController.create(),
    },
];

const form = useForm({
    slug: null,
    name: null,
    description: null,
    permissions: [],
});

permissions.map((permission) => {
    permission.checked = false;

    return permission;
});

const submit = () => {
    form.permissions = permissions.filter((permission) => permission.checked);

    form.post(RoleController.store());
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Create Role`" />

        <div class="w-full space-y-6 p-4">
            <form
                @submit.prevent="submit"
                class="space-y-4"
            >
                <div class="grid">
                    <Label for="slug">Slug</Label>
                    <Input
                        id="slug"
                        class="mt-1 block w-full"
                        v-model="form.slug"
                        :placeholder="`Slug`"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.slug"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        Name
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="name"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        :placeholder="`Name`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.name"
                    />
                </div>

                <div class="grid">
                    <Label for="description">Description</Label>
                    <Textarea
                        id="description"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        :placeholder="`Description`"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.description"
                    />
                </div>

                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead></TableHead>
                            <TableHead>Permission</TableHead>
                            <TableHead>Description</TableHead>
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
                                    :disabled="!can(permission.slug)"
                                />
                            </TableCell>
                            <TableCell>{{ permission.name }}</TableCell>
                            <TableCell>{{ permission.description }}</TableCell>
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
