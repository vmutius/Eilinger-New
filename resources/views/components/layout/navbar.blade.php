<header class="fixed top-0 w-full bg-primary">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <h1 class="text-white font-bold text-xl">
                <a href="{{ route('index', app()->getLocale()) }}" class="hover:text-accent transition-colors">
                    Eilinger Stiftung
                </a>
            </h1>

            <nav class="hidden md:flex items-center space-x-4">
                <ul class="flex items-center space-x-6">
                    <x-nav.item href="{{ route('index', app()->getLocale()) }}#hero" :active="request()->is(app()->getLocale())">
                        {{ __('home.home') }}
                    </x-nav.item>

                    <x-nav.item href="{{ route('index', app()->getLocale()) }}#about" :active="request()->url() === url(app()->getLocale()) . '#about'">
                        {{ __('home.about') }}
                    </x-nav.item>

                    <x-nav.item href="{{ route('index', app()->getLocale()) }}#our-values" :active="request()->url() === url(app()->getLocale()) . '#our-values'">
                        {{ __('home.funding') }}
                    </x-nav.item>

                    <x-nav.item href="{{ route('index', app()->getLocale()) }}#projekte" :active="request()->url() === url(app()->getLocale()) . '#projekte'">
                        {{ __('home.projects') }}
                    </x-nav.item>

                    <x-nav.item href="{{ route('index', app()->getLocale()) }}#gesuche" :active="request()->url() === url(app()->getLocale()) . '#gesuche'">
                        {{ __('home.requests') }}
                    </x-nav.item>

                    @auth
                        <x-nav.item href="{{ route('user_dashboard', app()->getLocale()) }}"
                            class="bg-accent hover:bg-accent-hover text-white px-4 py-2 rounded-md transition-colors">
                            Dashboard
                        </x-nav.item>
                    @else
                        <x-nav.item href="{{ route('login', app()->getLocale()) }}"
                            class="bg-accent hover:bg-accent-hover text-white px-4 py-2 rounded-md transition-colors">
                            {{ __('home.register') }}
                        </x-nav.item>
                    @endauth

                    {{-- Language Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false"
                            class="flex items-center text-white hover:text-accent transition-colors">
                            {{ strtoupper(app()->getLocale()) }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-50">
                            @foreach (config('app.languages') as $langLocale => $langName)
                                <a href="{{ url()->current() }}?change_language={{ $langLocale }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ strtoupper($langLocale) }} ({{ $langName }})
                                </a>
                            @endforeach
                        </div>
                    </div>
                </ul>
            </nav>

            <!-- Mobile menu button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white hover:text-accent"
                x-data="{ mobileMenuOpen: false }">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="md:hidden bg-primary-800" x-data="{ mobileMenuOpen: false }">
        <!-- Mobile navigation items -->
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Add your mobile menu items here -->
        </div>
    </div>
</header>
