<script setup lang="ts">
// packages
import { Link, usePage } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
import { isRef } from 'vue';
// shadcn ui
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';

import { urlIsActive } from '@/lib/utils';
import type { NavItem } from '@/types';

defineProps<{
    items: NavItem[];
}>();

const page = usePage();
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>
            {{ wTrans('common.platform') }}
        </SidebarGroupLabel>
        <SidebarMenu>
            <slot
                v-for="item in items"
                :key="item.title"
            >
                <SidebarMenuItem v-if="item.isVisible ?? false">
                    <SidebarMenuButton
                        as-child
                        :is-active="urlIsActive(item.href, page.url)"
                        :tooltip="isRef(item.title) ? item.title.value : item.title"
                    >
                        <Link :href="item.href">
                            <component :is="item.icon" />
                            <span>{{ item.title }}</span>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </slot>
        </SidebarMenu>
    </SidebarGroup>
</template>
