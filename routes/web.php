<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/google/callback', function () {
    $user = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
        ->stateless()
        ->user();
    dd($user);
    // $user->token
});
