// packages
import { InertiaLinkProps } from '@inertiajs/vue3';
import type { LucideIcon } from 'lucide-vue-next';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface Country {
    id: number;
    currency_id?: number;
    iso_alpha_2: string;
    iso_alpha_3: string;
    iso_numeric: number;
    name: string;
}

export interface Currency {
    id: number;
    iso_alpha: string;
    iso_numeric: number;
    name: string;
    symbol: string;
    decimal_precision: number;
    exchange_rate: number;
}

export interface Language {
    id: number;
    iso_alpha_2: string;
    iso_alpha_3: string;
    name: string;
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon;
    isActive?: boolean;
    isVisible?: boolean;
}

export interface Permission {
    id: number;
    slug: string;
    name: string;
    description?: string;
}

export interface Role {
    id: number;
    slug: string;
    name: string;
    description?: string;
}

export interface Script {
    id: number;
    iso_alpha: string;
    iso_numeric: number;
    name: string;
    direction: string;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
};

export type BreadcrumbItemType = BreadcrumbItem;
