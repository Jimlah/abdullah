<?php

use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;

test('guest can not authenticate', function () {
    Route::get('/auth', fn()=>'Authenticated')->middleware('auth');
    Route::get('/login', fn()=>'login')->name('login');

    get('/auth')
        ->assertRedirect(route('login'))
        ->assertSeeText('login');
})->skip();
