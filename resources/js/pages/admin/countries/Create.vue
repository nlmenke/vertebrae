<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
// generated (wayfinder)
import CountryController from '@/actions/App/Http/Controllers/Admin/CountryController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Currency, SharedData } from '@/types';

const page = usePage<SharedData>();
const currencies = page.props.currencies as Currency[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Countries',
        href: CountryController.index(),
    },
    {
        title: 'Create',
        href: CountryController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Create Country`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="CountryController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid">
                    <Label for="currency">Currency</Label>
                    <Select name="currency_id">
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Currency`" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">None</SelectItem>
                            <SelectItem
                                v-for="currency in currencies"
                                :key="currency.id"
                                :value="`${currency.id}`"
                            >
                                {{ currency.name }} ({{ currency.iso_alpha }})
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>

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
