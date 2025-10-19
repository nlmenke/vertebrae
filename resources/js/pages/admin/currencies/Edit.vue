<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import CurrencyController from '@/actions/App/Http/Controllers/Admin/CurrencyController';

import InputError from '@/components/InputError.vue';
import DeleteCurrency from '@/components/currencies/DeleteCurrency.vue';
import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Currency, SharedData } from '@/types';

const page = usePage<SharedData>();
const currency = page.props.currency as Currency;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Currencies',
        href: CurrencyController.index(),
    },
    {
        title: 'Edit (' + currency.name + ')',
        href: CurrencyController.edit(currency),
    },
];
</script>

<template>
    <Head :title="`Edit Currency`" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="CurrencyController.update.form(currency)"
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
                        v-model="currency.iso_alpha"
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
                        v-model="currency.iso_numeric"
                        :placeholder="`ISO Numeric`"
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
                        v-model="currency.name"
                        :placeholder="`Name`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="grid">
                    <Label for="symbol">
                        Symbol
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="symbol"
                        name="symbol"
                        class="mt-1 block w-full"
                        v-model="currency.symbol"
                        :placeholder="`Symbol`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.symbol"
                    />
                </div>

                <div class="grid">
                    <Label for="decimal_precision">
                        Decimal Precision
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="decimal_precision"
                        name="decimal_precision"
                        class="mt-1 block w-full"
                        v-model="currency.decimal_precision"
                        :placeholder="`Decimal Precision`"
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
                        Exchange Rate
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="exchange_rate"
                        name="exchange_rate"
                        class="mt-1 block w-full"
                        v-model="currency.exchange_rate"
                        :placeholder="`Exchange Rate`"
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
                    <Button :disabled="processing"> Save </Button>

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

            <DeleteCurrency
                v-if="can('delete-currencies')"
                :currency="currency"
            />
        </div>
    </AppLayout>
</template>
