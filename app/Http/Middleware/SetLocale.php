<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale') ?? config('app.locale');

        if (! in_array($locale, ['en', 'fr']) || ! is_string($locale)) {
            Log::error('Invalid locale provided', ['locale' => $locale]);
            abort(Response::HTTP_BAD_REQUEST);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
