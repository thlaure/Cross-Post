<nav>
    <ul>
        <li><a href="{{ route('home') }}">{{ __('navbar.home') }}</a></li>
        <li>
            <a href="{{ route(Route::currentRouteName(), ['locale' => 'fr']) }}" class="{{ 'fr' === App::getLocale() ? 'active' : '' }}">FR</a> | 
            <a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}" class="{{ 'en' === App::getLocale() ? 'active' : '' }}">EN</a>
        </li>
    </ul>
</nav>
