<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Github\OAuthController;
use App\Http\Controllers\CloudInitConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('App');
});

Route::get('/config/create', function () {
    return inertia('CreateConfig');
});

Route::post('/config/create', [CloudInitConfigController::class, 'store']);

Route::get('/auth/login', function () {
    return inertia('Login');
});

Route::post('/auth/login', [AuthController::class, 'loginOrCreate']);

Route::get('/auth/github', [OAuthController::class, 'redirectToProvider']);
Route::get('/auth/github/callback', [OAuthController::class, 'handleProviderCallback']);

Route::get('/auth/logout', function () {
    Auth::logout();
    return redirect('/auth/login');
});
