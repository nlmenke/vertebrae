<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
// generated (wayfinder)
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';

import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import AuthBase from '@/layouts/AuthLayout.vue';

defineProps<{
    canRegister: boolean;
    canResetPassword: boolean;
    status?: string;
}>();
</script>

<template>
    <AuthBase
        :title="wTrans('auth.log_in.title').value"
        :description="wTrans('auth.log_in.description').value"
    >
        <Head :title="wTrans('auth.log_in.header_title').value" />

        <div
            v-if="status"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <Form
            v-bind="store.form()"
            :reset-on-success="['password']"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email">
                        {{ wTrans('users.fields.email') }}
                    </Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        placeholder="email@example.com"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="password">
                            {{ wTrans('users.fields.password') }}
                        </Label>
                        <TextLink
                            v-if="canResetPassword"
                            :href="request()"
                            class="text-sm"
                            :tabindex="5"
                        >
                            {{ wTrans('auth.button.forgot_password') }}
                        </TextLink>
                    </div>
                    <Input
                        id="password"
                        type="password"
                        name="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        :placeholder="wTrans('users.fields.password').value"
                    />
                    <InputError :message="errors.password" />
                </div>

                <div class="flex items-center justify-between">
                    <Label
                        for="remember"
                        class="flex items-center space-x-3"
                    >
                        <Checkbox
                            id="remember"
                            name="remember"
                            :tabindex="3"
                        />
                        {{ wTrans('auth.remember_me') }}
                    </Label>
                </div>

                <Button
                    type="submit"
                    class="mt-4 w-full"
                    :tabindex="4"
                    :disabled="processing"
                    data-test="login-button"
                >
                    <Spinner v-if="processing" />
                    {{ wTrans('auth.button.log_in') }}
                </Button>
            </div>

            <div
                v-if="canRegister"
                class="text-center text-sm text-muted-foreground"
            >
                {{ wTrans('auth.no_account') }}
                <TextLink
                    :href="register()"
                    :tabindex="5"
                >
                    {{ wTrans('auth.button.sign_up') }}
                </TextLink>
            </div>
        </Form>
    </AuthBase>
</template>
