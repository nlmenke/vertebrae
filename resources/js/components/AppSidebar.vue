<script setup lang="ts">
// packages
import { Link } from '@inertiajs/vue3';
import { wTrans, wTransChoice } from 'laravel-vue-i18n';
import { Banknote, BookA, Earth, Folder, Languages, LayoutGrid, ScrollText, Shield, User } from 'lucide-vue-next';
// shadcn ui
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
// generated (wayfinder)
import { index as CountryControllerIndex } from '@/actions/App/Http/Controllers/Admin/CountryController';
import { index as CurrencyControllerIndex } from '@/actions/App/Http/Controllers/Admin/CurrencyController';
import { index as LanguageControllerIndex } from '@/actions/App/Http/Controllers/Admin/LanguageController';
import { index as LocaleControllerIndex } from '@/actions/App/Http/Controllers/Admin/LocaleController';
import { index as RoleControllerIndex } from '@/actions/App/Http/Controllers/Admin/RoleController';
import { index as ScriptControllerIndex } from '@/actions/App/Http/Controllers/Admin/ScriptController';
import { index as UserControllerIndex } from '@/actions/App/Http/Controllers/Admin/UserController';
import { dashboard } from '@/routes';

import AppLogo from '@/components/AppLogo.vue';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { can } from '@/composables/hasPermissions';
import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: wTrans('common.dashboard'),
        href: dashboard(),
        icon: LayoutGrid,
        isVisible: true,
    },
    {
        title: wTransChoice('countries.countries', 2),
        href: CountryControllerIndex(),
        icon: Earth,
        isVisible: can('view-countries'),
    },
    {
        title: wTransChoice('currencies.currencies', 2),
        href: CurrencyControllerIndex(),
        icon: Banknote,
        isVisible: can('view-currencies'),
    },
    {
        title: wTransChoice('languages.languages', 2),
        href: LanguageControllerIndex(),
        icon: Languages,
        isVisible: can('view-languages'),
    },
    {
        title: wTransChoice('locales.locales', 2),
        href: LocaleControllerIndex(),
        icon: BookA,
        isVisible: can('view-locales'),
    },
    {
        title: wTransChoice('roles.roles', 2),
        href: RoleControllerIndex(),
        icon: Shield,
        isVisible: can('view-roles'),
    },
    {
        title: wTransChoice('scripts.scripts', 2),
        href: ScriptControllerIndex(),
        icon: ScrollText,
        isVisible: can('view-scripts'),
    },
    {
        title: wTransChoice('users.users', 2),
        href: UserControllerIndex(),
        icon: User,
        isVisible: can('view-users'),
    },
];

const footerNavItems: NavItem[] = [
    {
        title: wTrans('common.github_repo'),
        href: 'https://github.com/nlmenke/vertebrae',
        icon: Folder,
    },
];
</script>

<template>
    <Sidebar
        collapsible="icon"
        variant="inset"
    >
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton
                        size="lg"
                        as-child
                    >
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
