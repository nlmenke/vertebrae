<script setup lang="ts">
// packages
import { Form, Head, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import LanguageController from '@/actions/App/Http/Controllers/Admin/LanguageController';

import InputError from '@/components/InputError.vue';
import DeleteLanguage from '@/components/languages/DeleteLanguage.vue';
import { can } from '@/composables/hasPermissions';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, Language, SharedData } from '@/types';

const page = usePage<SharedData>();
const language = page.props.language as Language;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('languages.languages', 2),
        href: LanguageController.index(),
    },
    {
        title: wTrans('common.edit', {
            value: language.name,
        }),
        href: LanguageController.edit(language),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.edit', {
                    valut: wTransChoice('languages.languages', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="LanguageController.update.form(language)"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid">
                    <Label for="iso_alpha_2">
                        {{ wTrans('languages.fields.iso_alpha_2') }}
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
                        v-model="language.iso_alpha_2"
                        :placeholder="wTrans('languages.fields.iso_alpha_2').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_2"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_alpha_3">
                        {{ wTrans('languages.fields.iso_alpha_3') }}
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
                        v-model="language.iso_alpha_3"
                        :placeholder="wTrans('languages.fields.iso_alpha_3').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha_3"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        {{ wTrans('languages.fields.name') }}
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
                        v-model="language.name"
                        :placeholder="wTrans('languages.fields.name').value"
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

            <DeleteLanguage
                v-if="can('delete-languages')"
                :language="language"
            />
        </div>
    </AppLayout>
</template>
