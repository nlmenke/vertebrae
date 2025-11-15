<script setup lang="ts">
// packages
import { Form } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
import { useTemplateRef } from 'vue';
// shadcn ui
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
// generated (wayfinder)
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';

import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';

const passwordInput = useTemplateRef('passwordInput');
</script>

<template>
    <div class="space-y-6">
        <HeadingSmall
            :title="
                wTrans('common.delete.title', {
                    value: wTrans('users.account').value.toLowerCase(),
                }).value
            "
            :description="wTrans('users.delete.description').value"
        />
        <div class="space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 dark:border-red-200/10 dark:bg-red-700/10">
            <div class="relative space-y-0.5 text-red-600 dark:text-red-100">
                <p class="font-medium">{{ wTrans('common.delete.warning.title') }}</p>
                <p class="text-sm">{{ wTrans('common.delete.warning.description') }}</p>
            </div>
            <Dialog>
                <DialogTrigger as-child>
                    <Button
                        variant="destructive"
                        data-test="delete-user-button"
                    >
                        {{
                            wTrans('common.delete.title', {
                                value: wTrans('users.account').value.toLowerCase(),
                            })
                        }}
                    </Button>
                </DialogTrigger>
                <DialogContent>
                    <Form
                        v-bind="ProfileController.destroy.form()"
                        reset-on-success
                        @error="() => passwordInput?.$el?.focus()"
                        :options="{
                            preserveScroll: true,
                        }"
                        class="space-y-6"
                        v-slot="{ errors, processing, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle>
                                {{ wTrans('users.delete.dialog.title') }}
                            </DialogTitle>
                            <DialogDescription>
                                {{ wTrans('users.delete.dialog.description') }}
                            </DialogDescription>
                        </DialogHeader>

                        <div class="grid gap-2">
                            <Label
                                for="password"
                                class="sr-only"
                            >
                                {{ wTrans('users.fields.password') }}
                            </Label>
                            <Input
                                id="password"
                                type="password"
                                name="password"
                                ref="passwordInput"
                                :placeholder="wTrans('users.fields.password').value"
                            />
                            <InputError :message="errors.password" />
                        </div>

                        <DialogFooter class="gap-2">
                            <DialogClose as-child>
                                <Button
                                    variant="secondary"
                                    @click="
                                        () => {
                                            clearErrors();
                                            reset();
                                        }
                                    "
                                >
                                    {{ wTrans('common.button.cancel') }}
                                </Button>
                            </DialogClose>

                            <Button
                                type="submit"
                                variant="destructive"
                                :disabled="processing"
                                data-test="confirm-delete-user-button"
                            >
                                {{
                                    wTrans('common.delete.title', {
                                        value: wTrans('users.account').value.toLowerCase(),
                                    })
                                }}
                            </Button>
                        </DialogFooter>
                    </Form>
                </DialogContent>
            </Dialog>
        </div>
    </div>
</template>
