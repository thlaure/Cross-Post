<?php

use App\Http\Controllers\PostSocialPost;
use App\Http\Controllers\SocialPostCreate;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('page.social-post.create', ['locale' => App::currentLocale()]);
})->name('home');

Route::middleware([SetLocale::class])->prefix('/{locale}')->group(function () {
    Route::get('/social-post/create', SocialPostCreate::class)->name('page.social-post.create');
    Route::post('/social-post', PostSocialPost::class)->name('post.social-post');
});
