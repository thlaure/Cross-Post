<?php

use App\Http\Controllers\Web\SocialPostCreate;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('page.social-posts.create', ['locale' => App::currentLocale()]);
})->name('home');

Route::middleware([SetLocale::class])->prefix('/{locale}')->group(function () {
    Route::get('/social-posts/create', SocialPostCreate::class)->name('page.social-posts.create');
});
