<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div class="font-extrabold text-4xl">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto" />
                </a>
            </div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm dark:bg-slate-800"
                responsive />
            <x-mary-button label="Notifications" icon="o-bell" link="###"
                class="btn-ghost btn-sm dark:bg-slate-800" responsive />

            <x-mary-theme-toggle class="btn-sm hidden" @theme-changed="console.log($event.detail)" responsive />

            <x-mary-dropdown label="{{ Auth::user()->name }}" class="btn-ghost" responsive>
                <div class="">{{ Auth::user()->email }}</div>
                <div class=""> {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</div>

                <x-mary-menu-item title="User Profile" link="/user/profile" />

            </x-mary-dropdown>

            {{-- User --}}
            @if ($user = auth()->user())
                <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover>
                    <x-slot:actions>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff">
                                <x-mary-icon name="o-power" />
                            </button>
                        </form>
                    </x-slot:actions>
                </x-mary-list-item>
            @endif
        </x-slot:actions>
    </x-mary-nav>

    {{-- The main content with `with-nav` and `full-width` --}}
    <x-mary-main>
        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-base-400">

            {{-- Activates the menu item when a route matches the `link` property --}}
            <x-mary-menu activate-by-route class="border border-solid w-64 mt-3">

                <x-mary-menu-item title="Home" icon="o-envelope" link="/" />

                <x-mary-menu-item title="Messages" icon="o-paper-airplane" badge="78+" />

                <x-mary-menu-item title="Hello" icon="o-sparkles" badge="new" badge-classes="!badge-primary" />

                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-mary-menu-sub>

                <x-mary-menu-item title="Internal link" icon="o-arrow-down" link="/docs/components/alert" />

                {{-- Notice `external` --}}
                <x-mary-menu-item title="External link" icon="o-arrow-uturn-right" link="https://google.com" external />

                {{-- Notice `no-wire-navigate` --}}
                <x-mary-menu-item title="Internal without wire:navigate" icon="o-power" link="/docs/components/menu"
                    no-wire-navigate />

                <x-mary-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />

            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>

    </x-mary-main>

    {{--  TOAST area --}}
    <x-mary-toast />

    @stack('modals')

    @livewireScripts
</body>

</html>
