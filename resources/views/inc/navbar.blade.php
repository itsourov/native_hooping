<div class="" x-data="{ offCanvasMenu: false }">

    <div class="fixed inset-0 flex z-40 lg:hidden" x-cloak x-show="offCanvasMenu" role="dialog" aria-modal="true">

        <div x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-25" x-cloak x-show="offCanvasMenu" aria-hidden="true"></div>


        <div x-cloak x-show="offCanvasMenu" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative max-w-xs w-full bg-white dark:bg-gray-800  shadow-xl pb-12 flex flex-col overflow-y-auto">
            <div class="px-4 pt-5 pb-2 flex">
                <button type="button" x-on:click="offCanvasMenu= !offCanvasMenu"
                    class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400 ">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Links -->

            <div class="border-t border-gray-200 dark:border-gray-700 py-6 px-4 space-y-4">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.index')">
                    {{ __('Shop') }}
                </x-nav-link>


                <x-nav-link :href="route('pages.about')" :active="request()->routeIs('pages.about')">
                    {{ __('About') }}
                </x-nav-link>
                <x-nav-link :href="route('pages.contact')" :active="request()->routeIs('pages.contact')">
                    {{ __('Contact') }}
                </x-nav-link>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-700 py-6 px-4 space-y-4">

                @auth


                    <x-nav-link :href="route('my-account.index')" :active="request()->routeIs('my-account')">
                        <x-svg.user-circle class="inline w-4 h-4" /> {{ __('Dashboard') }}
                    </x-nav-link>
                    @admin
                        <x-nav-link :href="route('admin.dashboard')">
                            <x-svg.lock class="inline w-4 h-4" /> {{ __('Admin Panel') }}
                        </x-nav-link>
                    @endadmin

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <x-svg.exit class="inline w-4 h-4" /></i> {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        <x-svg.exit class="inline w-4 h-4" /> {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        <x-svg.user-plus class="inline w-4 h-4" /> {{ __('Register') }}
                    </x-nav-link>
                @endauth


            </div>

            {{-- <div class="border-t border-gray-200 dark:border-gray-700 py-6 px-4 space-y-4">
                @foreach (Config::get('languages') as $lang => $language)
                    <x-nav-link :href="route('lang.switch', $lang)" active="{{ $lang == App::getLocale() }}">
                        <span class="fi fi-{{ Config::get('languages')[$lang]['flag-icon'] }} mr-1"></span>
                        {{ $language['display'] }}
                    </x-nav-link>
                @endforeach
            </div> --}}
        </div>
    </div>

    <header class="relative bg-white dark:bg-gray-800 border-b border-gray-200  dark:border-gray-700 ">
        <p
            class="bg-indigo-600 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
            {{ __('Website is in development') }}
        </p>

        <nav aria-label="Top" class="container mx-auto px-2 ">
            <div class="">
                <div class="h-16 flex items-center">

                    <button type="button" x-on:click="offCanvasMenu = !offCanvasMenu"
                        class=" p-2 -ml-2 rounded-md text-gray-500 lg:hidden">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="ml-4 flex lg:ml-0">
                        <a href="{{ route('home') }}">
                            <span class="sr-only">Workflow</span>
                            <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="">
                        </a>
                    </div>

                    <!-- Flyout menus -->
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="h-full flex space-x-8">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>

                            <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.index')">
                                {{ __('Shop') }}
                            </x-nav-link>

                            <x-nav-link :href="route('pages.about')" :active="request()->routeIs('pages.about')">
                                {{ __('About') }}
                            </x-nav-link>
                            <x-nav-link :href="route('pages.contact')" :active="request()->routeIs('pages.contact')">
                                {{ __('Contact') }}
                            </x-nav-link>


                        </div>
                    </div>

                    <div class="ml-auto flex items-center">
                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-3">


                            @auth


                                <x-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                        <x-nav-link href="#">
                                            <x-svg.user-circle class="inline w-5 h-5" /> {{ __('Profile') }}
                                        </x-nav-link>
                                    </x-slot>
                                    <x-slot name="content">


                                        <x-dropdown-link :href="route('my-account.index')">
                                            {{ __('Dashboard') }}
                                        </x-dropdown-link>



                                        @admin
                                            <x-dropdown-link :href="route('admin.dashboard')">
                                                {{ __('Admin Panel') }}
                                            </x-dropdown-link>
                                        @endadmin

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="border-none">
                                    <x-svg.exit class="inline w-4 h-4" /></i> {{ __('Login') }}
                                </x-nav-link>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="border-none">
                                    <x-svg.user-plus class="inline w-4 h-4" /> {{ __('Register') }}
                                </x-nav-link>
                            @endauth
                        </div>

                        {{-- <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <div
                                    class="hidden lg:ml-4 lg:flex hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded">
                                    <a href="#" class=" flex items-center">
                                        <span
                                            class="fi fi-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                                        <span class="ml-2 block text-sm font-medium">
                                            {{ Config::get('languages')[App::getLocale()]['display'] }} </span>
                                        <span class="sr-only">, change Language</span>
                                    </a>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <x-dropdown-link :href="route('lang.switch', $lang)">
                                            <span
                                                class="fi fi-{{ Config::get('languages')[$lang]['flag-icon'] }}"></span>
                                            {{ $language['display'] }}
                                        </x-dropdown-link>
                                    @endif
                                @endforeach

                            </x-slot>
                        </x-dropdown> --}}


                        <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
                            class=" text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none   ml-2 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="tooltip-toggle" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                            Toggle dark mode
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!-- Cart -->
                        <livewire:shop.cart-preview />
                    </div>
                </div>
            </div>
        </nav>
    </header>


</div>

@if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
        !auth()->user()->hasVerifiedEmail())
    <div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <div id="alert-1" class=" text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <div class="container mx-auto flex p-4">



                <x-svg.info class="w-5 h-5" class="flex-shrink-0 w-5 h-5" />
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification"
                        class="underline text-sm text-gray-500  hover:  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <x-svg.x class="w-5 h-5" />
                </button>
            </div>
        </div>
        @if (session('status') === 'verification-link-sent')
            <div id="alert-3" class=" text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <div class="container mx-auto flex p-4">


                    <x-svg.check-circle class="flex-shrink-0 w-5 h-5" />
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <x-svg.x class="w-5 h-5" />
                    </button>
                </div>
            </div>
        @endif
    </div>
@endif
