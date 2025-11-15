<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
import { ref } from 'vue';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
// generated (wayfinder)
import { update } from '@/routes/password';

import InputError from '@/components/InputError.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';

const props = defineProps<{
    token: string;
    email: string;
}>();

const inputEmail = ref(props.email);
</script>

<template>
    <AuthLayout
        :title="wTrans('auth.reset_password.title').value"
        :description="wTrans('auth.reset_password.description').value"
    >
        <Head :title="wTrans('auth.reset_password.header_title').value" />

        <Form
            v-bind="update.form()"
            :transform="(data) => ({ ...data, token, email })"
            :reset-on-success="['password', 'password_confirmation']"
            v-slot="{ errors, processing }"
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
                        autocomplete="email"
                        v-model="inputEmail"
                        class="mt-1 block w-full"
                        readonly
                        placeholder="email@example.com"
                    />
                    <InputError
                        :message="errors.email"
                        class="mt-2"
                    />
                </div>

                <div class="grid gap-2">
                    <Label for="password">
                        Password
                        {{ wTrans('users.fields.password') }}
                    </Label>
                    <Input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        class="mt-1 block w-full"
                        autofocus
                        :placeholder="wTrans('users.fields.password').value"
                    />
                    <InputError :message="errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">
                        {{ wTrans('users.fields.confirm_password') }}
                    </Label>
                    <Input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        class="mt-1 block w-full"
                        :placeholder="wTrans('users.fields.confirm_password').value"
                    />
                    <InputError :message="errors.password_confirmation" />
                </div>

                <Button
                    type="submit"
                    class="mt-4 w-full"
                    :disabled="processing"
                    data-test="reset-password-button"
                >
                    <Spinner v-if="processing" />
                    {{ wTrans('auth.button.reset_password') }}
                </Button>
            </div>
        </Form>
    </AuthLayout>
</template>
