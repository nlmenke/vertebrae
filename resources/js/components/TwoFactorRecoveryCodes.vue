<script setup lang="ts">
// packages
import { Form } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
import { Eye, EyeOff, LockKeyhole, RefreshCw } from 'lucide-vue-next';
import { nextTick, onMounted, ref, useTemplateRef } from 'vue';
// shadcn ui
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
// generated (wayfinder)
import { regenerateRecoveryCodes } from '@/routes/two-factor';

import AlertError from '@/components/AlertError.vue';
import { useTwoFactorAuth } from '@/composables/useTwoFactorAuth';

const { recoveryCodesList, fetchRecoveryCodes, errors } = useTwoFactorAuth();
const isRecoveryCodesVisible = ref<boolean>(false);
const recoveryCodeSectionRef = useTemplateRef('recoveryCodeSectionRef');

const toggleRecoveryCodesVisibility = async () => {
    if (!isRecoveryCodesVisible.value && !recoveryCodesList.value.length) {
        await fetchRecoveryCodes();
    }

    isRecoveryCodesVisible.value = !isRecoveryCodesVisible.value;

    if (isRecoveryCodesVisible.value) {
        await nextTick();
        recoveryCodeSectionRef.value?.scrollIntoView({ behavior: 'smooth' });
    }
};

onMounted(async () => {
    if (!recoveryCodesList.value.length) {
        await fetchRecoveryCodes();
    }
});
</script>

<template>
    <Card class="w-full">
        <CardHeader>
            <CardTitle class="flex gap-3">
                <LockKeyhole class="size-4" />
                {{ wTrans('auth.two-factor.recovery.title') }}
            </CardTitle>
            <CardDescription>
                {{ wTrans('auth.two-factor.recovery.description') }}
            </CardDescription>
        </CardHeader>
        <CardContent>
            <div class="flex flex-col gap-3 select-none sm:flex-row sm:items-center sm:justify-between">
                <Button
                    @click="toggleRecoveryCodesVisibility"
                    class="w-fit"
                >
                    <component
                        :is="isRecoveryCodesVisible ? EyeOff : Eye"
                        class="size-4"
                    />
                    {{
                        wTrans('auth.two-factor.recovery.show_hide_recovery_codes', {
                            value: isRecoveryCodesVisible ? wTrans('common.hide').value : wTrans('common.view').value,
                        })
                    }}
                </Button>

                <Form
                    v-if="isRecoveryCodesVisible && recoveryCodesList.length"
                    v-bind="regenerateRecoveryCodes.form()"
                    method="post"
                    :options="{ preserveScroll: true }"
                    @success="fetchRecoveryCodes"
                    #default="{ processing }"
                >
                    <Button
                        variant="secondary"
                        type="submit"
                        :disabled="processing"
                    >
                        <RefreshCw />
                        {{ wTrans('auth.two-factor.recovery.regenerate_codes') }}
                    </Button>
                </Form>
            </div>
            <div
                :class="[
                    'relative overflow-hidden transition-all duration-300',
                    isRecoveryCodesVisible ? 'h-auto opacity-100' : 'h-0 opacity-0',
                ]"
            >
                <div
                    v-if="errors?.length"
                    class="mt-6"
                >
                    <AlertError :errors="errors" />
                </div>
                <div
                    v-else
                    class="mt-3 space-y-3"
                >
                    <div
                        ref="recoveryCodeSectionRef"
                        class="grid gap-1 rounded-lg bg-muted p-4 font-mono text-sm"
                    >
                        <div
                            v-if="!recoveryCodesList.length"
                            class="space-y-2"
                        >
                            <div
                                v-for="n in 8"
                                :key="n"
                                class="h-4 animate-pulse rounded bg-muted-foreground/20"
                            ></div>
                        </div>
                        <div
                            v-else
                            v-for="(code, index) in recoveryCodesList"
                            :key="index"
                        >
                            {{ code }}
                        </div>
                    </div>
                    <p class="text-xs text-muted-foreground select-none">
                        {{ wTrans('auth.two-factor.recovery.removed_after_use') }}
                    </p>
                </div>
            </div>
        </CardContent>
    </Card>
</template>
