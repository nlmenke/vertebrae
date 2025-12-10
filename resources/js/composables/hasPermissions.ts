// packages
import { usePage } from '@inertiajs/vue3';

import type { SharedData, User } from '@/types';

export function can(permission: string): boolean {
    const page = usePage<SharedData>();
    const user = page.props.auth.user as User;

    return user.permission_list.includes(permission);
}
