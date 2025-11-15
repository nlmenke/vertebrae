<script setup lang="ts">
// packages
import { Form, Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
import { ShieldBan, ShieldCheck } from 'lucide-vue-next';
import { onUnmounted, ref } from 'vue';
// shadcn ui
import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
// generated (wayfinder)
import { disable, enable, show } from '@/routes/two-factor';

import HeadingSmall from '@/components/HeadingSmall.vue';
import TwoFactorRecoveryCodes from '@/components/TwoFactorRecoveryCodes.vue';
import TwoFactorSetupModal from '@/components/TwoFactorSetupModal.vue';
import { useTwoFactorAuth } from '@/composables/useTwoFactorAuth';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { BreadcrumbItem } from '@/types';

interface Props {
    requiresConfirmation?: boolean;
    twoFactorEnabled?: boolean;
}

withDefaults(defineProps<Props>(), {
    requiresConfirmation: false,
    twoFactorEnabled: false,
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTrans('auth.two-factor.title'),
        href: show(),
    },
];

const { hasSetupData, clearTwoFactorAuthData } = useTwoFactorAuth();
const showSetupModal = ref<boolean>(false);

onUnmounted(() => {
    clearTwoFactorAuthData();
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="wTrans('auth.two-factor.title').value" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    :title="wTrans('auth.two-factor.title').value"
                    :description="wTrans('auth.two-factor.description').value"
                />

                <div
                    v-if="!twoFactorEnabled"
                    class="flex flex-col items-start justify-start space-y-4"
                >
                    <Badge variant="destructive">
                        {{ wTrans('common.disabled') }}
                    </Badge>

                    <p class="text-muted-foreground">
                        {{ wTrans('auth.two-factor.2fa_enable_description') }}
                    </p>

                    <div>
                        <Button
                            v-if="hasSetupData"
                            @click="showSetupModal = true"
                        >
                            <ShieldCheck />
                            {{ wTrans('auth.button.continue_setup') }}
                        </Button>
                        <Form
                            v-else
                            v-bind="enable.form()"
                            @success="showSetupModal = true"
                            #default="{ processing }"
                        >
                            <Button
                                type="submit"
                                :disabled="processing"
                            >
                                <ShieldCheck />
                                {{ wTrans('auth.button.enable_2fa') }}
                            </Button>
                        </Form>
                    </div>
                </div>

                <div
                    v-else
                    class="flex flex-col items-start justify-start space-y-4"
                >
                    <Badge variant="default">
                        {{ wTrans('common.enabled') }}
                    </Badge>

                    <p class="text-muted-foreground">
                        {{ wTrans('auth.two-factor.2fa_enabled_description') }}
                    </p>

                    <TwoFactorRecoveryCodes />

                    <div class="relative inline">
                        <Form
                            v-bind="disable.form()"
                            #default="{ processing }"
                        >
                            <Button
                                variant="destructive"
                                type="submit"
                                :disabled="processing"
                            >
                                <ShieldBan />
                                {{ wTrans('auth.button.disable_2fa') }}
                            </Button>
                        </Form>
                    </div>
                </div>

                <TwoFactorSetupModal
                    v-model:isOpen="showSetupModal"
                    :requiresConfirmation="requiresConfirmation"
                    :twoFactorEnabled="twoFactorEnabled"
                />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
