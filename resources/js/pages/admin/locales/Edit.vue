<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
import { toInteger } from 'lodash';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
// generated (wayfinder)
import LocaleController from '@/actions/App/Http/Controllers/Admin/LocaleController';

import InputError from '@/components/InputError.vue';
import DeleteLocale from '@/components/locales/DeleteLocale.vue';
import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Country, Language, Locale, Script, SharedData } from '@/types';

const page = usePage<SharedData>();
const locale = page.props.locale as Locale;
const countries = page.props.countries as Country[];
const languages = page.props.languages as Language[];
const scripts = page.props.scripts as Script[];
let country = countries.find((country) => country.id === locale.country_id) as Country | null;
let language = languages.find((language) => language.id === locale.language_id) as Language | null;
let script = scripts.find((script) => script.id === locale.script_id) as Script | null;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Locales',
        href: LocaleController.index(),
    },
    {
        title: 'Edit (' + locale.native + ')',
        href: LocaleController.edit(locale),
    },
];

const updateCountryValue = (newCountryId: number) => {
    country = countries.find((country) => country.id === toInteger(newCountryId)) as Country | null;
};

const updateLanguageValue = (newLanguageId: number) => {
    language = languages.find((language) => language.id === toInteger(newLanguageId)) as Language | null;
};

const updateScriptValue = (newScriptId: number) => {
    script = scripts.find((script) => script.id === toInteger(newScriptId)) as Script | null;
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Edit Locale`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="LocaleController.update.form(locale)"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid">
                    <Label for="language">Language</Label>
                    <Select
                        name="language_id"
                        v-model="locale.language_id"
                        @update:model-value="updateLanguageValue"
                    >
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Language`">
                                {{ language?.name ?? '' }}
                            </SelectValue>
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">None</SelectItem>
                            <SelectItem
                                v-for="language in languages"
                                :key="language.id"
                                :value="language.id"
                            >
                                {{ language.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <div class="grid">
                    <Label for="country">Country</Label>
                    <Select
                        name="country_id"
                        v-model="locale.country_id"
                        @update:model-value="updateCountryValue"
                    >
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Country`">
                                {{ country?.name ?? 'None' }}
                            </SelectValue>
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">None</SelectItem>
                            <SelectItem
                                v-for="country in countries"
                                :key="country.id"
                                :value="country.id"
                            >
                                {{ country.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <div class="grid">
                    <Label for="script">Script</Label>
                    <Select
                        name="script_id"
                        v-model="locale.script_id"
                        @update:model-value="updateScriptValue"
                    >
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Script`">
                                {{ script?.name ?? '' }}
                            </SelectValue>
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem :value="null">None</SelectItem>
                            <SelectItem
                                v-for="script in scripts"
                                :key="script.id"
                                :value="script.id"
                            >
                                {{ script.name }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <div class="grid">
                    <Label for="code">
                        Code
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="code"
                        name="code"
                        class="mt-1 block w-full"
                        v-model="locale.code"
                        :placeholder="`Code`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.code"
                    />
                </div>

                <div class="grid">
                    <Label for="native">
                        Native
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="native"
                        name="native"
                        class="mt-1 block w-full"
                        v-model="locale.native"
                        :placeholder="`Native`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.native"
                    />
                </div>

                <div class="grid">
                    <Label for="decimal_mark">
                        Decimal Mark
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="decimal_mark"
                        name="decimal_mark"
                        class="mt-1 block w-full"
                        v-model="locale.decimal_mark"
                        :placeholder="`Decimal Mark`"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.decimal_mark"
                    />
                </div>

                <div class="grid">
                    <Label for="thousands_separator">
                        Thousands Separator
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Input
                        id="thousands_separator"
                        name="thousands_separator"
                        class="mt-1 block w-full"
                        v-model="locale.thousands_separator"
                        :placeholder="`Thousands Separator`"
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
                        v-model="locale.currency_symbol_first"
                    />
                    <Label for="currency_symbol_first">Currency Symbol First?</Label>
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox
                        id="active"
                        name="active"
                        v-model="locale.active"
                    />
                    <Label for="active">Active?</Label>
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

            <DeleteLocale
                v-if="can('delete-locales')"
                :locale="locale"
            />
        </div>
    </AppLayout>
</template>
