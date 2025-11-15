<script setup lang="ts">
// packages
import { Form, usePage } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
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
// generated (wayfinder)
import CurrencyController from '@/actions/App/Http/Controllers/Admin/CurrencyController';

import HeadingSmall from '@/components/HeadingSmall.vue';
import type { Currency, SharedData } from '@/types';

const page = usePage<SharedData>();
const currency = page.props.currency as Currency;
</script>

<template>
    <div class="space-y-6">
        <HeadingSmall
            :title="
                wTrans('common.delete.title', {
                    value: wTransChoice('currencies.currencies', 1).value,
                }).value
            "
            :description="
                wTrans('common.delete.description', {
                    value: currency.name,
                }).value
            "
        />

        <div class="space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 dark:border-red-200/10 dark:bg-red-700/10">
            <div class="5 relative space-y-0 text-red-600 dark:text-red-100">
                <p class="font-medium">{{ wTrans('common.delete.warning.title') }}</p>
                <p class="text-sm">{{ wTrans('common.delete.warning.description') }}</p>
            </div>
            <Dialog>
                <DialogTrigger as-child>
                    <Button variant="destructive">{{ wTrans('common.button.delete') }}</Button>
                </DialogTrigger>
                <DialogContent>
                    <Form
                        v-bind="CurrencyController.destroy.form(currency)"
                        class="space-y-6"
                        v-slot="{ processing, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle>
                                {{
                                    wTrans('common.delete.dialog.title', {
                                        value: wTransChoice('currencies.currencies', 1).value.toLowerCase(),
                                    })
                                }}
                            </DialogTitle>
                            <DialogDescription>
                                {{
                                    wTrans('common.delete.dialog.description', {
                                        value: currency.name,
                                    })
                                }}
                            </DialogDescription>
                        </DialogHeader>

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
                            >
                                {{ wTrans('common.button.delete') }}
                            </Button>
                        </DialogFooter>
                    </Form>
                </DialogContent>
            </Dialog>
        </div>
    </div>
</template>
