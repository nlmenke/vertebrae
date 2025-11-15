<script setup lang="ts">
// packages
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
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
        title: wTransChoice('roles.roles', 2),
        href: RoleController.index(),
    },
    {
        title: wTrans('common.button.create'),
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
        <Head
            :title="
                wTrans('common.create', {
                    value: wTransChoice('roles.roles', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <form
                @submit.prevent="submit"
                class="space-y-4"
            >
                <div class="grid">
                    <Label for="slug">{{ wTrans('roles.fields.slug') }}</Label>
                    <Input
                        id="slug"
                        class="mt-1 block w-full"
                        v-model="form.slug"
                        :placeholder="wTrans('roles.fields.slug').value"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.slug"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        {{ wTrans('roles.fields.name') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="name"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        :placeholder="wTrans('roles.fields.name').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.name"
                    />
                </div>

                <div class="grid">
                    <Label for="description">{{ wTrans('roles.fields.description') }}</Label>
                    <Textarea
                        id="description"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        :placeholder="wTrans('roles.fields.description').value"
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
                                    :disabled="!can(permission.slug)"
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
