<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Spinner } from '@/components/ui/spinner';
// generated (wayfinder)
import { logout } from '@/routes';
import { send } from '@/routes/verification';

import TextLink from '@/components/TextLink.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <AuthLayout
        :title="wTrans('auth.verify_email.title').value"
        :description="wTrans('auth.verify_email.description').value"
    >
        <Head :title="wTrans('auth.verify_email.header_title').value" />

        <div
            v-if="status === 'verification-link-sent'"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ wTrans('auth.verify_email.email_sent') }}
        </div>

        <Form
            v-bind="send.form()"
            class="space-y-6 text-center"
            v-slot="{ processing }"
        >
            <Button
                :disabled="processing"
                variant="secondary"
            >
                <Spinner v-if="processing" />
                {{ wTrans('auth.button.resend_verification_email') }}
            </Button>

            <TextLink
                :href="logout()"
                as="button"
                class="mx-auto block text-sm"
            >
                {{ wTrans('auth.button.log_out') }}
            </TextLink>
        </Form>
    </AuthLayout>
</template>
