<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
// generated (wayfinder)
import { store } from '@/routes/password/confirm';

import InputError from '@/components/InputError.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
</script>

<template>
    <AuthLayout
        :title="wTrans('auth.confirm_password.title').value"
        :description="wTrans('auth.confirm_password.description').value"
    >
        <Head :title="wTrans('auth.confirm_password.header_title').value" />

        <Form
            v-bind="store.form()"
            reset-on-success
            v-slot="{ errors, processing }"
        >
            <div class="space-y-6">
                <div class="grid gap-2">
                    <Label htmlFor="password">
                        {{ wTrans('users.fields.password').value }}
                    </Label>
                    <Input
                        id="password"
                        type="password"
                        name="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="current-password"
                        autofocus
                    />

                    <InputError :message="errors.password" />
                </div>

                <div class="flex items-center">
                    <Button
                        class="w-full"
                        :disabled="processing"
                        data-test="confirm-password-button"
                    >
                        <Spinner v-if="processing" />
                        {{ wTrans('auth.button.confirm_password') }}
                    </Button>
                </div>
            </div>
        </Form>
    </AuthLayout>
</template>
