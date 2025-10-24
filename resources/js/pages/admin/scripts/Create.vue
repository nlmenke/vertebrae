<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
// generated (wayfinder)
import ScriptController from '@/actions/App/Http/Controllers/Admin/ScriptController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Scripts',
        href: ScriptController.index(),
    },
    {
        title: 'Create',
        href: ScriptController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Create Script`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="ScriptController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid">
                    <Label for="iso_alpha">
                        ISO Alpha
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha"
                        name="iso_alpha"
                        class="mt-1 block w-full"
                        :placeholder="`ISO Alpha`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_numeric">
                        ISO Numeric
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_numeric"
                        name="iso_numeric"
                        class="mt-1 block w-full"
                        :placeholder="`ISO Numeric`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_numeric"
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

                <div class="grid">
                    <Label for="direction">Direction</Label>
                    <Select name="direction">
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Direction`" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="ltr">Left-to-Right</SelectItem>
                            <SelectItem value="rtl">Right-to-Left</SelectItem>
                            <SelectItem value="ttb">Top-to-Bottom</SelectItem>
                            <SelectItem value="varies">Varies</SelectItem>
                        </SelectContent>
                    </Select>
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
