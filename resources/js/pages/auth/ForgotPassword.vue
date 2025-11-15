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
import { login } from '@/routes';
import { email } from '@/routes/password';

import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <AuthLayout
        :title="wTrans('auth.forgot_password.title').value"
        :description="wTrans('auth.forgot_password.description').value"
    >
        <Head :title="wTrans('auth.forgot_password.header_title').value" />

        <div
            v-if="status"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <div class="space-y-6">
            <Form
                v-bind="email.form()"
                v-slot="{ errors, processing }"
            >
                <div class="grid gap-2">
                    <Label for="email">
                        {{ wTrans('users.fields.email').value }}
                    </Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        autocomplete="off"
                        autofocus
                        placeholder="email@example.com"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="my-6 flex items-center justify-start">
                    <Button
                        class="w-full"
                        :disabled="processing"
                        data-test="email-password-reset-link-button"
                    >
                        <Spinner v-if="processing" />
                        {{ wTrans('auth.button.reset_password_link') }}
                    </Button>
                </div>
            </Form>

            <div class="space-x-1 text-center text-sm text-muted-foreground">
                <span>{{ wTrans('auth.or_return_to') }}</span>
                <TextLink :href="login()">{{ wTrans('auth.button.log_in').value.toLowerCase() }}</TextLink>
            </div>
        </div>
    </AuthLayout>
</template>
