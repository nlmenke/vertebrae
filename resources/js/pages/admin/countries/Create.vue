<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
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
        title: wTransChoice('countries.countries', 2),
        href: CountryController.index(),
    },
    {
        title: wTrans('common.button.create'),
        href: CountryController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.create', {
                    value: wTransChoice('countries.countries', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="CountryController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid">
                    <Label for="currency">{{ wTransChoice('currencies.currencies', 1) }}</Label>
                    <Select name="currency_id">
                        <SelectTrigger>
                            <SelectValue
                                :placeholder="
                                    wTrans('common.select', {
                                        value: wTransChoice('currencies.currencies', 1).value,
                                    }).value
                                "
                            />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">{{ wTrans('common.none') }}</SelectItem>
                            <SelectItem
                                v-for="currency in currencies"
                                :key="currency.id"
                                :value="currency.id"
                            >
                                {{ currency.name }} ({{ currency.iso_alpha }})
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <div class="grid">
                    <Label for="iso_alpha_2">
                        {{ wTrans('countries.fields.iso_alpha_2') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha_2"
                        name="iso_alpha_2"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('countries.fields.iso_alpha_2').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_2"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_alpha_3">
                        {{ wTrans('countries.fields.iso_alpha_3') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha_3"
                        name="iso_alpha_3"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('countries.fields.iso_alpha_3').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_3"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_numeric">
                        {{ wTrans('countries.fields.iso_numeric') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_numeric"
                        name="iso_numeric"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('countries.fields.iso_numeric').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_numeric"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        {{ wTrans('countries.fields.name') }}
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
                        :placeholder="wTrans('countries.fields.name').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="flex items-center">
                    <Button :disabled="processing">
                        {{ wTrans('common.button.save') }}
                    </Button>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
