<?php

use App\Http\Controllers\Api\PostSocialPost;
use Illuminate\Support\Facades\Route;

Route::post('/social-posts', PostSocialPost::class);
