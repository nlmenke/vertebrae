<script setup lang="ts">
// packages
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';
import { toast } from 'vue-sonner';
import 'vue-sonner/style.css';
// shadcn ui
import { Toaster } from '@/components/ui/sonner';

import { useAppearance } from '@/composables/useAppearance';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage<SharedData>();
const { appearance } = useAppearance();

watch(
    () => page.props.toast,
    (toaster) => {
        if (toaster.length === 0) {
            return;
        }

        if (toaster.style === 'error') {
            setTimeout(() => {
                toast.error(toaster.message);
            }, 100);
        } else if (toaster.style === 'warning') {
            setTimeout(() => {
                toast.warning(toaster.message);
            }, 100);
        } else if (toaster.style === 'success') {
            setTimeout(() => {
                toast.success(toaster.message);
            }, 100);
        } else if (toaster.style === 'info') {
            setTimeout(() => {
                toast.info(toaster.message);
            }, 100);
        } else {
            setTimeout(() => {
                toast(toaster.message);
            }, 100);
        }
    },
    {
        immediate: true,
    },
);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Toaster
            richColors
            :theme="appearance"
        />

        <slot />
    </AppLayout>
</template>
