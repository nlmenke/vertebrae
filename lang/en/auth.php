<?php
/**
 * Authentication Language Lines - EN.
 *
 * The following language lines are used during authentication for various
 * messages that we need to display to the user. You are free to modify
 * these language lines according to your application's requirements.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 *
 * @since 0.0.0-framework introduced
 */

declare(strict_types=1);

return [

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'have_account' => 'Already have an account?',
    'no_account' => 'Don\'t have an account?',
    'or_return_to' => 'Or, return to',
    'or_you_can' => 'or you can',
    'remember_me' => 'Remember me',

    'button' => [
        'confirm_password' => 'Confirm password',
        'continue_setup' => 'Continue setup',
        'create_account' => 'Create account',
        'disable_2fa' => 'Disable 2FA',
        'enable_2fa' => 'Enable 2FA',
        'forgot_password' => 'Forgot password?',
        'log_in' => 'Log in',
        'log_out' => 'Log out',
        'register' => 'Register',
        'resend_verification_email' => 'Resend verification email',
        'reset_password' => 'Reset password',
        'reset_password_link' => 'Email password reset link',
        'sign_up' => 'Sign up',
    ],

    'confirm_password' => [
        'title' => 'Confirm Your Password',
        'description' => 'This is a secure area of the application. Please confirm your password before continuing.',
        'header_title' => 'Confirm Password',
    ],

    'errors' => [
        'two-factor' => [
            'default' => 'Something went wrong.',
            'fetch_failed' => 'Failed to fetch: :value',

            'qr_code' => 'QR code',
            'setup_key' => 'setup key',
            'recovery_codes' => 'recovery codes',
        ],
    ],

    'forgot_password' => [
        'title' => 'Forgot Password',
        'description' => 'Enter your email to receive a password reset link.',
        'header_title' => 'Forgot Password',
    ],

    'log_in' => [
        'title' => 'Log Into Your Account',
        'description' => 'Enter your email and password below to log in.',
        'header_title' => 'Log In',
    ],

    'register' => [
        'title' => 'Create An Account',
        'description' => 'Enter your details below to create your account.',
        'header_title' => 'Register',
    ],

    'reset_password' => [
        'title' => 'Reset Password',
        'description' => 'Please enter your new password below.',
        'header_title' => 'Reset Password',
    ],

    'two-factor' => [
        'title' => 'Two-Factor Authentication',
        'description' => 'Manage your two-factor authentication settings.',
        '2fa_enable_description' => 'When you enable two-factor authentication, you will be prompted for a secure pin during login. This pin can be retrieved from a TOTP-supported application on your phone.',
        '2fa_enabled_description' => 'With two-factor authentication enabled, you will be prompted for a secure, random pin during login, which you can retrieve from the TOTP-supported application on your phone.',

        'enter_code_manually' => 'or, enter the code manually',
        'enter_recovery_code' => 'Enter recovery code',

        'challenge' => [
            'authentication' => [
                'title' => 'Authentication Code',
                'description' => 'Enter the authentication code provided by your authenticator application.',
                'toggle_text' => 'login using a recovery code',
            ],

            'recovery' => [
                'title' => 'Recovery Code',
                'description' => 'Please confirm access to your account by entering one of your emergency recovery codes.',
                'toggle_text' => 'login using an authentication code',
            ],
        ],

        'enabled' => [
            'title' => 'Two-Factor Authentication Enabled',
            'description' => 'Two-factor authentication is now enabled. Scan the QR code or enter the setup key in your authenticator app.',
        ],

        'recovery' => [
            'title' => '2FA Recovery Codes',
            'description' => 'Recovery codes let you regain access if you lose your 2FA device. Store them in a secure password manager.',

            'regenerate_codes' => 'Regenerate Codes',
            'removed_after_use' => 'Each recovery code can be used once to access your account and will be removed after use. If you need more, click <span class="font-bold">Regenerate Codes</span> above.',
            'show_hide_recovery_codes' => ':value Recovery Codes',
        ],

        'setup' => [
            'title' => 'Enable Two-Factor Authentication',
            'description' => 'To finish enabling two-factor authentication, scan the QR code or enter the setup key in your authenticator app',
        ],

        'verify' => [
            'title' => 'Verify Authentication Code',
            'description' => 'Enter the 6-digit code from your authenticator app',
        ],
    ],

    'verify_email' => [
        'title' => 'Verify Email',
        'description' => 'Please verify your email address by clicking on the link we just emailed to you.',
        'header_title' => 'Email Verification',

        'email_sent' => 'A new verification link has been sent to the email address you provided during registration.',
    ],

];
