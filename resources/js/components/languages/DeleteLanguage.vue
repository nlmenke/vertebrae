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
import LanguageController from '@/actions/App/Http/Controllers/Admin/LanguageController';

import HeadingSmall from '@/components/HeadingSmall.vue';
import type { Language, SharedData } from '@/types';

const page = usePage<SharedData>();
const language = page.props.language as Language;
</script>

<template>
    <div class="space-y-6">
        <HeadingSmall
            :title="`Delete Currency`"
            :description="`Delete '${language.name}' from the system.`"
        />

        <div class="space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 dark:border-red-200/10 dark:bg-red-700/10">
            <div class="5 relative space-y-0 text-red-600 dark:text-red-100">
                <p class="font-medium">Warning</p>
                <p class="text-sm">Please proceed with caution, this cannot be undone.</p>
            </div>
            <Dialog>
                <DialogTrigger as-child>
                    <Button
                        variant="destructive"
                        data-test="delete-language-button"
                    >
                        Delete
                    </Button>
                </DialogTrigger>
                <DialogContent>
                    <Form
                        v-bind="LanguageController.destroy.form(language)"
                        class="space-y-6"
                        v-slot="{ processing, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle>Are you sure you want to delete this language?</DialogTitle>
                            <DialogDescription>
                                This cannot be undone. Please confirm you would like to delete '{{ language.name }}.'
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
                                data-test="confirm-delete-language-button"
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
