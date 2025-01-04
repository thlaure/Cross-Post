<?php

use App\Http\Controllers\SocialPostCreate;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('get.social-post.create', ['locale' => App::currentLocale()]);
})->name('home');

Route::middleware([SetLocale::class])->prefix('/{locale}')->group(function () {
    Route::get('/social-post/create', [SocialPostCreate::class, 'index'])->name('get.social-post.create');
    Route::post('/social-post/create', [SocialPostCreate::class, 'store'])->name('post.social-post.create');
});
