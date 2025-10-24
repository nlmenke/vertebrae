<script setup lang="ts">
// packages
import { Link } from '@inertiajs/vue3';
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
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
        isVisible: true,
    },
    {
        title: 'Countries',
        href: CountryControllerIndex(),
        icon: Earth,
        isVisible: can('view-countries'),
    },
    {
        title: 'Currencies',
        href: CurrencyControllerIndex(),
        icon: Banknote,
        isVisible: can('view-currencies'),
    },
    {
        title: 'Languages',
        href: LanguageControllerIndex(),
        icon: Languages,
        isVisible: can('view-languages'),
    },
    {
        title: 'Locales',
        href: LocaleControllerIndex(),
        icon: BookA,
        isVisible: can('view-locales'),
    },
    {
        title: 'Roles',
        href: RoleControllerIndex(),
        icon: Shield,
        isVisible: can('view-roles'),
    },
    {
        title: 'Scripts',
        href: ScriptControllerIndex(),
        icon: ScrollText,
        isVisible: can('view-scripts'),
    },
    {
        title: 'Users',
        href: UserControllerIndex(),
        icon: User,
        isVisible: can('view-users'),
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'GitHub Repo',
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
