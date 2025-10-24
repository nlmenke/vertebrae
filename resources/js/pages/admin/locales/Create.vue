<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
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
        title: 'Locales',
        href: LocaleController.index(),
    },
    {
        title: 'Create',
        href: LocaleController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="`Create Locale`" />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="LocaleController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing, recentlySuccessful }"
            >
                <div class="grid">
                    <Label for="language">
                        Language
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Select name="language_id">
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Language`" />
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
                    <Label for="country">Country</Label>
                    <Select name="country_id">
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Country`" />
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
                    <InputError
                        class="mt-2"
                        :message="errors.country_id"
                    />
                </div>

                <div class="grid">
                    <Label for="script">
                        Script
                        <span
                            class="-ml-2 text-red-600 dark:text-red-500"
                            :title="`Required`"
                        >
                            *
                        </span>
                    </Label>
                    <Select name="script_id">
                        <SelectTrigger>
                            <SelectValue :placeholder="`Select a Script`" />
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
                    />
                    <Label for="currency_symbol_first">Currency Symbol First?</Label>
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
                    <Label for="active">Active?</Label>
                    <InputError
                        class="mt-2"
                        :message="errors.active"
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
