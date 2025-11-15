<script setup lang="ts">
// packages
import { Head } from '@inertiajs/vue3';
import { wTrans } from 'laravel-vue-i18n';
// generated (wayfinder)
import { edit } from '@/routes/appearance';

import AppearanceTabs from '@/components/AppearanceTabs.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: wTrans('users.account_settings.appearance.title'),
        href: edit(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head :title="wTrans('users.account_settings.appearance.heading_title').value" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    :title="wTrans('users.account_settings.appearance.title').value"
                    :description="wTrans('users.account_settings.appearance.description').value"
                />
                <AppearanceTabs />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
