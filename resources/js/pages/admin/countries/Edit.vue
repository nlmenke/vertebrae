<script setup lang="ts">
// packages
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { toInteger } from 'lodash';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
// generated (wayfinder)
import CountryController from '@/actions/App/Http/Controllers/Admin/CountryController';

import DeleteCountry from '@/components/countries/DeleteCountry.vue';
import InputError from '@/components/InputError.vue';
import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Country, Currency, SharedData } from '@/types';

const page = usePage<SharedData>();
const country = page.props.country as Country;
const currencies = page.props.currencies as Currency[];
let currency = currencies.find((currency) => currency.id === country.currency_id) as Currency;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Countries',
        href: CountryController.index(),
    },
    {
        title: 'Edit (' + country.name + ')',
        href: CountryController.edit(country),
    },
];

const form = useForm({
    currency_id: country.currency_id,
    iso_alpha_2: country.iso_alpha_2,
    iso_alpha_3: country.iso_alpha_3,
    iso_numeric: country.iso_numeric,
    name: country.name,
});

const updateCurrencyValue = (newCurrencyId: number) => {
    currency = currencies.find((currency) => currency.id === toInteger(newCurrencyId));
};

const submit = () => {
    form.patch(CountryController.update(country));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Edit Country`" />

        <div class="w-full space-y-6 p-4">
            <form
                @submit.prevent="submit"
                class="space-y-4"
            >
                <div class="grid">
                    <Label for="currency">Currencies</Label>
                    <Select
                        v-model="form.currency_id"
                        @update:model-value="updateCurrencyValue"
                    >
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Currency`">
                                {{ currency ? currency.name + ' (' + currency.iso_alpha + ')' : 'None' }}
                            </SelectValue>
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
                    <InputError
                        class="mt-2"
                        :message="form.errors.currency_id"
                    />
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
                        class="mt-1 block w-full"
                        v-model="form.iso_alpha_2"
                        :placeholder="`ISO Alpha 2`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.iso_alpha_2"
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
                        class="mt-1 block w-full"
                        v-model="form.iso_alpha_3"
                        :placeholder="`ISO Alpha 3`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.iso_alpha_3"
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
                        class="mt-1 block w-full"
                        v-model="form.iso_numeric"
                        :placeholder="`ISO Numeric`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.iso_numeric"
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

            <DeleteCountry
                v-if="can('delete-countries')"
                :country="country"
            />
        </div>
    </AppLayout>
</template>
