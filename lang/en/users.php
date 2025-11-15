<?php
/**
 * User Language Lines - EN.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

return [

    'users' => 'User|Users',

    'account' => 'Account',
    'edit_permissions' => 'Edit Permissions',
    'edit_roles' => 'Edit Roles',
    'settings' => 'Settings',

    'permissions_updated_successfully' => 'Permissions for :user were updated successfully.',
    'roles_updated_successfully' => 'Roles for :user were updated successfully.',

    'account_settings' => [
        'title' => 'Settings',
        'description' => 'Manage your profile and account settings.',

        'appearance' => [
            'title' => 'Appearance Settings',
            'description' => 'Update your account\'s appearance settings.',
            'heading_title' => 'Appearance Settings',
        ],

        'password' => [
            'title' => 'Update Password',
            'description' => 'Ensure your account is using a long, random password to stay secure.',
            'heading_title' => 'Password Settings',
        ],

        'profile' => [
            'title' => 'Profile Information',
            'description' => 'Update your name and email address.',
            'heading_title' => 'Profile Settings',

            'email_unverified_notice' => 'Your email address is unverified.',
            'resend_verification_email' => 'Click here to resend the verification email.',
            'verification_email_sent' => 'A new verification link has been sent to your email address.',
        ],
    ],

    'button' => [
        'save_password' => 'Save password',
    ],

    'appearance' => [
        'tabs' => [
            'dark' => 'Dark',
            'light' => 'Light',
            'system' => 'System',
        ],
    ],

    'delete' => [
        'description' => 'Delete your account and all of its resources',

        'dialog' => [
            'title' => 'Are you sure you want to delete your account?',
            'description' => 'Once your account is deleted, all of its resources and data will also be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
        ],
    ],

    'fields' => [
        'confirm_password' => 'Confirm Password',
        'current_password' => 'Current Password',
        'email' => 'Email Address',
        'name' => 'Name',
        'new_password' => 'New Password',
        'password' => 'Password',
    ],

    'nav' => [
        'appearance' => 'Appearance',
        'password' => 'Password',
        'profile' => 'Profile',
        'two-factor_auth' => 'Two-Factor Auth',
    ],

];
