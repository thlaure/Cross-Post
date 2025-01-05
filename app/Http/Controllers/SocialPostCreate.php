<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SocialPostCreate extends Controller
{
    public function __invoke(): View
    {
        return view('social-posts.create');
    }
}
