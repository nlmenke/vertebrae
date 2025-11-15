<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import UserController from '@/actions/App/Http/Controllers/Admin/UserController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, SharedData, User } from '@/types';

const page = usePage<SharedData>();
const user = page.props.user as User;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('users.users', 2),
        href: UserController.index(),
    },
    {
        title: wTrans('common.edit', {
            value: user.name,
        }),
        href: UserController.edit(user),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.edit', {
                    value: wTransChoice('users.users', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="UserController.update.form(user)"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid gap-2">
                    <Label for="name">
                        {{ wTrans('users.fields.name') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="name"
                        name="name"
                        class="mt-1 block w-full"
                        v-model="user.name"
                        :placeholder="wTrans('users.fields.name').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="grid gap-2">
                    <Label for="email">{{ wTrans('users.fields.email') }}</Label>
                    <Input
                        id="email"
                        name="email"
                        class="mt-1 block w-full"
                        v-model="user.email"
                        :placeholder="wTrans('users.fields.email').value"
                        disabled
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.email"
                    />
                </div>

                <div class="flex items-center gap-4">
                    <Button :disabled="processing">
                        {{ wTrans('common.button.save') }}
                    </Button>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
