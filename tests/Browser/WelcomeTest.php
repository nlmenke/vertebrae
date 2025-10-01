<?php

test('has welcome page', function () {
    visit('/')
        ->assertSee('Laravel');
});
