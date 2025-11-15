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
import ScriptController from '@/actions/App/Http/Controllers/Admin/ScriptController';

import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem, SharedData } from '@/types';

const page = usePage<SharedData>();
const directionList = page.props.scriptDirections;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTransChoice('scripts.scripts', 2),
        href: ScriptController.index(),
    },
    {
        title: wTrans('common.button.create'),
        href: ScriptController.create(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head
            :title="
                wTrans('common.create', {
                    value: wTransChoice('scripts.scripts', 1).value,
                }).value
            "
        />

        <div class="w-full space-y-6 p-4">
            <Form
                v-bind="ScriptController.store.form()"
                class="space-y-4"
                v-slot="{ errors, processing }"
            >
                <div class="grid">
                    <Label for="iso_alpha">
                        {{ wTrans('scripts.fields.iso_alpha') }}
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
                        :placeholder="wTrans('scripts.fields.iso_alpha').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_alpha"
                    />
                </div>

                <div class="grid">
                    <Label for="iso_numeric">
                        {{ wTrans('scripts.fields.iso_numeric') }}
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
                        :placeholder="wTrans('scripts.fields.iso_numeric').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.iso_numeric"
                    />
                </div>

                <div class="grid">
                    <Label for="name">
                        {{ wTrans('scripts.fields.name') }}
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
                        :placeholder="wTrans('scripts.fields.name').value"
                        required
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.name"
                    />
                </div>

                <div class="grid">
                    <Label for="direction">{{ wTrans('scripts.fields.direction') }}</Label>
                    <Select name="direction">
                        <SelectTrigger>
                            <SelectValue
                                :placeholder="
                                    wTrans('common.select', {
                                        value: wTrans('scripts.fields.direction').value,
                                    }).value
                                "
                            />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem
                                v-for="(direction, key) in directionList"
                                :key="key"
                                :value="key"
                            >
                                {{ direction }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
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
