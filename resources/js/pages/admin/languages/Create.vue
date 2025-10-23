<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import LanguageController from '@/actions/App/Http/Controllers/Admin/LanguageController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Languages',
        href: LanguageController.index(),
    },
    {
        title: 'Create',
        href: LanguageController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Create Language`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="LanguageController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid">
                    <Label for="iso_alpha_2">
                        ISO Alpha 2
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha_2"
                        name="iso_alpha_2"
                        class="mt-1 block w-full"
                        :placeholder="`ISO Alpha 2`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_2"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_alpha_3">
                        ISO Alpha 3
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha_3"
                        name="iso_alpha_3"
                        class="mt-1 block w-full"
                        :placeholder="`ISO Alpha 3`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_3"
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
                        name="name"
                        class="mt-1 block w-full"
                        :placeholder="`Name`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="flex items-center">
                    <Button :disabled="processing">Save</Button>

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
