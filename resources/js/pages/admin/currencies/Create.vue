<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import CurrencyController from '@/actions/App/Http/Controllers/Admin/CurrencyController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('currencies.currencies', 2),
        href: CurrencyController.index(),
    },
    {
        title: wTrans('common.button.create'),
        href: CurrencyController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.create', {
                    value: wTransChoice('currencies.currencies', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="CurrencyController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid">
                    <Label for="iso_alpha">
                        {{ wTrans('currencies.fields.iso_alpha') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="iso_alpha"
                        name="iso_alpha"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('currencies.fields.iso_alpha').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_numeric">
                        {{ wTrans('currencies.fields.iso_numeric') }}
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
                        :placeholder="wTrans('currencies.fields.iso_numeric').value"
                        type="number"
                        step="1"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_numeric"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        {{ wTrans('currencies.fields.name') }}
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
                        :placeholder="wTrans('currencies.fields.name').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="grid">
                    <Label for="symbol">
                        {{ wTrans('currencies.fields.symbol') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="symbol"
                        name="symbol"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('currencies.fields.symbol').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.symbol"
                    />
                </div>

                <div class="grid">
                    <Label for="decimal_precision">
                        {{ wTrans('currencies.fields.decimal_precision') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="decimal_precision"
                        name="decimal_precision"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('currencies.fields.decimal_precision').value"
                        type="number"
                        step="1"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.decimal_precision"
                    />
                </div>

                <div class="grid">
                    <Label for="exchange_rate">
                        {{ wTrans('currencies.fields.exchange_rate') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="exchange_rate"
                        name="exchange_rate"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('currencies.fields.exchange_rate').value"
                        type="number"
                        step="0.000001"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.exchange_rate"
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
