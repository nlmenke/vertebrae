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
import ScriptController from '@/actions/App/Http/Controllers/Admin/ScriptController';

import HeadingSmall from '@/components/HeadingSmall.vue';
import type { Script, SharedData } from '@/types';

const page = usePage<SharedData>();
const script = page.props.script as Script;
</script>

<template>
    <div class="space-y-6">
        <HeadingSmall
            :title="
                wTrans('common.delete.title', {
                    value: wTransChoice('scripts.scripts', 1).value,
                }).value
            "
            :description="
                wTrans('common.delete.description', {
                    value: script.name,
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
                        v-bind="ScriptController.destroy.form(script)"
                        class="space-y-6"
                        v-slot="{ processing, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle>
                                {{
                                    wTrans('common.delete.dialog.title', {
                                        value: wTransChoice('scripts.scripts', 1).value.toLowerCase(),
                                    })
                                }}
                            </DialogTitle>
                            <DialogDescription>
                                {{
                                    wTrans('common.delete.dialog.description', {
                                        value: script.name,
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
                                    Cancel
                                </Button>
                            </DialogClose>

                            <Button
                                type="submit"
                                variant="destructive"
                                :disabled="processing"
                            >
                                Delete
                            </Button>
                        </DialogFooter>
                    </Form>
                </DialogContent>
            </Dialog>
        </div>
    </div>
</template>
