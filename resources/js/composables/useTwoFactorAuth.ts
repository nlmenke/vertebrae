// packages
import { wTrans } from 'laravel-vue-i18n';
import { computed, ref } from 'vue';
// generated (wayfinder)
import { qrCode, recoveryCodes, secretKey } from '@/routes/two-factor';

const fetchJson = async <T>(url: string): Promise<T> => {
    const response = await fetch(url, {
        headers: {
            Accept: 'application/json',
        },
    });

    if (!response.ok) {
        throw new Error(
            wTrans('auth.two-factor.errors.fetch_failed', {
                value: response.status,
            }).value,
        );
    }

    return response.json();
};

const errors = ref<string[]>([]);
const manualSetupKey = ref<string | null>(null);
const qrCodeSvg = ref<string | null>(null);
const recoveryCodesList = ref<string[]>([]);

const hasSetupData = computed<boolean>(() => qrCodeSvg.value !== null && manualSetupKey.value !== null);

export const useTwoFactorAuth = () => {
    const fetchQrCode = async (): Promise<void> => {
        try {
            const { svg } = await fetchJson<{ svg: string; url: string }>(qrCode.url());

            qrCodeSvg.value = svg;
        } catch {
            errors.value.push(
                wTrans('auth.errors.two-factor.fetch_failed', {
                    value: wTrans('auth.errors.two-factor.qr_code').value,
                }).value,
            );
            qrCodeSvg.value = null;
        }
    };

    const fetchSetupKey = async (): Promise<void> => {
        try {
            const { secretKey: key } = await fetchJson<{ secretKey: string }>(secretKey.url());

            manualSetupKey.value = key;
        } catch {
            errors.value.push(
                wTrans('auth.errors.two-factor.fetch_failed', {
                    value: wTrans('auth.errors.two-factor.setup_key').value,
                }).value,
            );
            manualSetupKey.value = null;
        }
    };

    const clearSetupData = (): void => {
        manualSetupKey.value = null;
        qrCodeSvg.value = null;
        clearErrors();
    };

    const clearErrors = (): void => {
        errors.value = [];
    };

    const clearTwoFactorAuthData = (): void => {
        clearSetupData();
        clearErrors();
        recoveryCodesList.value = [];
    };

    const fetchRecoveryCodes = async (): Promise<void> => {
        try {
            clearErrors();
            recoveryCodesList.value = await fetchJson<string[]>(recoveryCodes.url());
        } catch {
            errors.value.push(
                wTrans('auth.errors.two-factor.fetch_failed', {
                    value: wTrans('auth.errors.two-factor.recovery_codes').value,
                }).value,
            );
            recoveryCodesList.value = [];
        }
    };

    const fetchSetupData = async (): Promise<void> => {
        try {
            clearErrors();
            await Promise.all([fetchQrCode(), fetchSetupKey()]);
        } catch {
            qrCodeSvg.value = null;
            manualSetupKey.value = null;
        }
    };

    return {
        qrCodeSvg,
        manualSetupKey,
        recoveryCodesList,
        errors,
        hasSetupData,
        clearSetupData,
        clearErrors,
        clearTwoFactorAuthData,
        fetchQrCode,
        fetchSetupKey,
        fetchSetupData,
        fetchRecoveryCodes,
    };
};
