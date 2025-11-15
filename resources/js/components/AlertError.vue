<script setup lang="ts">
// packages
import { wTrans } from 'laravel-vue-i18n';
import { AlertCircle } from 'lucide-vue-next';
import { computed } from 'vue';
// shadcn ui
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';

interface Props {
    errors: string[];
    title?: string;
}

const props = withDefaults(defineProps<Props>(), {
    title: undefined,
});

const title = computed(() => props.title ?? wTrans('auth.errors.two-factor.default').value);
const uniqueErrors = computed(() => Array.from(new Set(props.errors)));
</script>

<template>
    <Alert variant="destructive">
        <AlertCircle class="size-4" />
        <AlertTitle>{{ title }}</AlertTitle>
        <AlertDescription>
            <ul class="list-inside list-disc text-sm">
                <li
                    v-for="(error, index) in uniqueErrors"
                    :key="index"
                >
                    {{ error }}
                </li>
            </ul>
        </AlertDescription>
    </Alert>
</template>
