<script setup lang="ts">
// packages
import { usePage } from '@inertiajs/vue3';
// shadcn ui
import { SidebarProvider } from '@/components/ui/sidebar';

interface Props {
    variant?: 'header' | 'sidebar';
}

defineProps<Props>();

const isOpen = usePage().props.sidebarOpen;
</script>

<template>
    <div
        v-if="variant === 'header'"
        class="flex min-h-screen w-full flex-col"
    >
        <slot />
    </div>
    <SidebarProvider
        v-else
        :default-open="isOpen"
    >
        <slot />
    </SidebarProvider>
</template>
