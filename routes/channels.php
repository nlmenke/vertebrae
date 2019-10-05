<?php declare(strict_types=1);

/**
 * Broadcast Channels.
 *
 * Here you may register all of the event broadcasting channels that your
 * application supports. The given channel authorization callbacks are
 * used to check if an authenticated user can listen to the channel.
 *
 * @package   Routes
 * @author    Taylor Otwell <taylor@laravel.com>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 * @since     0.0.0-framework introduced
 */

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});
