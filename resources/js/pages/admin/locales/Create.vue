<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
// generated (wayfinder)
import LocaleController from '@/actions/App/Http/Controllers/Admin/LocaleController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Country, Language, Script, SharedData } from '@/types';

const page = usePage<SharedData>();
const countries = page.props.countries as Country[];
const languages = page.props.languages as Language[];
const scripts = page.props.scripts as Script[];

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('locales.locales', 2),
        href: LocaleController.index(),
    },
    {
        title: wTrans('common.button.create'),
        href: LocaleController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.create', {
                    value: wTransChoice('locales.locales', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="LocaleController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid">
                    <Label for="language">
                        {{ wTransChoice('languages.language', 1) }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Select name="language_id">
                        <SelectTrigger>
                            <SelectValue
                                :placeholder="
                                    wTrans('common.select', {
                                        value: wTransChoice('languages.languages', 1).value,
                                    }).value
                                "
                            />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem
                                v-for="language in languages"
                                :key="language.id"
                                :value="language.id"
                            >
                                {{ language.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError
                        class="mt-2"
                        :message="errors.language_id"
                    />
                </div>

                <div class="grid">
                    <Label for="country">{{ wTransChoice('countries.countries', 1) }}</Label>
                    <Select name="country_id">
                        <SelectTrigger>
                            <SelectValue
                                :placeholder="
                                    wTrans('common.select', {
                                        value: wTransChoice('countries.countries', 1).value,
                                    }).value
                                "
                            />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">{{ wTrans('common.none') }}</SelectItem>
                            <SelectItem
                                v-for="country in countries"
                                :key="country.id"
                                :value="country.id"
                            >
                                {{ country.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError
                        class="mt-2"
                        :message="errors.country_id"
                    />
                </div>

                <div class="grid">
                    <Label for="script">
                        {{ wTransChoice('scripts.script', 1) }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Select name="script_id">
                        <SelectTrigger>
                            <SelectValue
                                :placeholder="
                                    wTrans('common.select', {
                                        value: wTransChoice('scripts.scripts', 1).value,
                                    }).value
                                "
                            />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem
                                v-for="script in scripts"
                                :key="script.id"
                                :value="script.id"
                            >
                                {{ script.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError
                        class="mt-2"
                        :message="errors.script_id"
                    />
                </div>

                <div class="grid">
                    <Label for="code">
                        {{ wTrans('locales.fields.code') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="code"
                        name="code"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('locales.fields.code').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.code"
                    />
                </div>

                <div class="grid">
                    <Label for="native">
                        {{ wTrans('locales.fields.native') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="native"
                        name="native"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('locales.fields.native').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.native"
                    />
                </div>

                <div class="grid">
                    <Label for="decimal_mark">
                        {{ wTrans('locales.fields.decimal_mark') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="decimal_mark"
                        name="decimal_mark"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('locales.fields.decimal_mark').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.decimal_mark"
                    />
                </div>

                <div class="grid">
                    <Label for="thousands_separator">
                        {{ wTrans('locales.fields.thousands_separator') }}
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="wTrans('common.required').value"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="thousands_separator"
                        name="thousands_separator"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('locales.fields.thousands_separator').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.thousands_separator"
                    />
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox
                        id="currency_symbol_first"
                        name="currency_symbol_first"
                    />
                    <Label for="currency_symbol_first">{{ wTrans('locales.fields.currency_symbol_first') }}?</Label>
                    <InputError
                        class="mt-2"
                        :message="errors.currency_symbol_first"
                    />
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox
                        id="active"
                        name="active"
                    />
                    <Label for="active">{{ wTrans('locales.fields.active') }}?</Label>
                    <InputError
                        class="mt-2"
                        :message="errors.active"
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
