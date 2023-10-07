<?php
/**
 * Authentication Language Lines - EN.
 *
 * The following language lines are used during authentication for various
 * messages that we need to display to the user. You are free to modify
 * these language lines according to your application's requirements.
 *
 * @package Languages - English
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link                  https://github.com/nlmenke/vertebrae
 * @since 0.0.0-framework introduced
 * @since x.x.x           added auth view strings
 */

declare(strict_types=1);

return [

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'register' => 'Register',
    'login' => 'Login',
    'logout' => 'Logout',

    'remember' => 'Remember Me',

    'password' => [
        'password' => 'Password',
        'confirm' => 'Confirm Password',
        'forgot' => 'Forgot Your Password?',

        'reset' => [
            'reset' => 'Reset Password',
            'send_link' => 'Send Password Reset Link',
        ],
    ],

    'verify' => [
        'email' => 'Verify Your Email Address',
        'link_sent' => 'A fresh verification link has been sent to your email address.',
        'check_email' => 'Before proceeding, please check your email for a verification link.',
        'no_email' => 'If you did not receive the email',
        'resend_email' => 'click here to request another',
    ],

];
