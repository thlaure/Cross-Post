<nav class="bg-main-gradient text-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-lg font-bold tracking-wide">
            <a href="{{ route('home') }}" class="hover:text-tertiary">
                {{ __('navbar.home') }}
            </a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route(Route::currentRouteName(), ['locale' => 'fr']) }}" 
               class="text-sm font-medium {{ 'fr' === App::getLocale() ? 'text-tertiary' : 'hover:text-tertiary' }}">
                FR
            </a>
            <span class="text-gray-500">|</span>
            <a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}" 
               class="text-sm font-medium {{ 'en' === App::getLocale() ? 'text-tertiary' : 'hover:text-tertiary' }}">
                EN
            </a>
        </div>
    </div>
</nav>
