<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $locale = $request->route('locale') ?? $request->header('Accept-Language') ?? config('app.locale', 'en');

        if (! is_string($locale) || ! in_array($locale, ['en', 'fr'])) {
            Log::error('Invalid locale provided', ['locale' => $locale]);
            $locale = 'en';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
