<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SetLocaleTest extends TestCase
{
    private function createBoundRequest(string $uri, ?string $locale = null): Request
    {
        $request = Request::create($uri, Request::METHOD_GET);
        $route = new Route([Request::METHOD_GET], '/{locale?}/some-route', ['locale' => $locale]);
        $route->bind($request);
        $request->setRouteResolver(fn () => $route);

        return $request;
    }

    public function test_handles_valid_locale()
    {
        $request = $this->createBoundRequest('/en/some-route', 'en');

        $middleware = new SetLocale;

        $response = $middleware->handle($request, function ($request) {
            return response('OK', Response::HTTP_OK);
        });

        $this->assertEquals('en', App::getLocale());
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function test_handles_invalid_locale()
    {
        Log::shouldReceive('error')->once()->with('Invalid locale provided', ['locale' => 'invalid']);

        $request = $this->createBoundRequest('/invalid/some-route', 'invalid');

        $middleware = new SetLocale;

        try {
            $middleware->handle($request, function ($request) {
                return response('OK', Response::HTTP_OK);
            });
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            $this->assertEquals(400, $e->getStatusCode());
        }
    }

    public function test_handles_missing_locale()
    {
        $request = $this->createBoundRequest('/some-route');

        $middleware = new SetLocale;

        $response = $middleware->handle($request, function ($request) {
            return response('OK', Response::HTTP_OK);
        });

        $this->assertEquals(config('app.locale'), App::getLocale());
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}
