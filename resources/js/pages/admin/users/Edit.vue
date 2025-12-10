<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
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
        title: 'Users',
        href: UserController.index(),
    },
    {
        title: 'Edit (' + user.name + ')',
        href: UserController.edit(user),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Edit User`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="UserController.update.form(user)"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid gap-2">
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
                        name="name"
                        class="mt-1 block w-full"
                        v-model="user.name"
                        :placeholder="`Name`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email Address</Label>
                    <Input
                        id="email"
                        name="email"
                        class="mt-1 block w-full"
                        v-model="user.email"
                        :placeholder="`Email Address`"
                        disabled
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.email"
                    />
                </div>

                <div class="flex items-center gap-4">
                    <Button
                        :disabled="processing"
                        data-test="update-user-button"
                    >
                        Save
                    </Button>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p
                            v-show="recentlySuccessful"
                            class="text-sm text-neutral-600"
                        >
                            Saved.
                        </p>
                    </Transition>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
