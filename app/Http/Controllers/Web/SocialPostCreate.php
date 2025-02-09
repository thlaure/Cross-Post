<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SocialPostCreate extends Controller
{
    public function __invoke(): View
    {
        return view('social-posts.create');
    }
}
