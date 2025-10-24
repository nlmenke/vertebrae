<script setup lang="ts">
// packages
import { Form, usePage } from '@inertiajs/vue3';
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
import LocaleController from '@/actions/App/Http/Controllers/Admin/LocaleController';

import HeadingSmall from '@/components/HeadingSmall.vue';
import type { Locale, SharedData } from '@/types';

const page = usePage<SharedData>();
const locale = page.props.locale as Locale;
</script>

<template>
    <div class="space-y-6">
        <HeadingSmall
            :title="`Delete Locale`"
            :description="`Delete '${locale.native}' from the system.`"
        />

        <div class="space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 dark:border-red-200/10 dark:bg-red-700/10">
            <div class="5 relative space-y-0 text-red-600 dark:text-red-100">
                <p class="font-medium">Warning</p>
                <p class="text-sm">Please proceed with caution, this cannot be undone.</p>
            </div>
            <Dialog>
                <DialogTrigger as-child>
                    <Button variant="destructive">Delete</Button>
                </DialogTrigger>
                <DialogContent>
                    <Form
                        v-bind="LocaleController.destroy.form(locale)"
                        class="space-y-6"
                        v-slot="{ processing, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle>Are you sure you want to delete this locale?</DialogTitle>
                            <DialogDescription>
                                This cannot be undone. Please confirm you would like to delete '{{ locale.native }}.'
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
