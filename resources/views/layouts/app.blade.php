<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | Ragify</title>

    @vite(['resources/css/app.css'])
    <script src="https://kit.fontawesome.com/255fd51aa4.js" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                init() {
                    const savedTheme = localStorage.getItem('theme');
                    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' :
                        'light';
                    this.theme = savedTheme || systemTheme;
                    this.updateTheme();
                },
                theme: 'light',
                toggle() {
                    this.theme = this.theme === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', this.theme);
                    this.updateTheme();
                },
                updateTheme() {
                    const html = document.documentElement;
                    const body = document.body;

                    if (this.theme === 'dark') {
                        html.classList.add('dark');
                        body?.classList.add('dark', 'bg-gray-900');
                    } else {
                        html.classList.remove('dark');
                        body?.classList.remove('dark', 'bg-gray-900');
                    }
                }
            });

            Alpine.store('sidebar', {
                isExpanded: window.innerWidth >= 1280,
                isMobileOpen: false,
                isHovered: false,

                toggleExpanded() {
                    this.isExpanded = !this.isExpanded;
                    this.isMobileOpen = false;
                },

                toggleMobileOpen() {
                    this.isMobileOpen = !this.isMobileOpen;
                },

                setMobileOpen(value) {
                    this.isMobileOpen = value;
                },

                setHovered(value) {
                    if (window.innerWidth >= 1280 && !this.isExpanded) {
                        this.isHovered = value;
                    }
                }
            });
        });
    </script>

    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const theme = savedTheme || systemTheme;

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                document.addEventListener('DOMContentLoaded', () => {
                    document.body.classList.add('dark', 'bg-gray-900');
                });
            } else {
                document.documentElement.classList.remove('dark');
                document.addEventListener('DOMContentLoaded', () => {
                    document.body.classList.remove('dark', 'bg-gray-900');
                });
            }
        })();
    </script>
</head>

<body x-data="{ loaded: true }" x-init="$store.sidebar.isExpanded = window.innerWidth >= 1280;
const checkMobile = () => {
    if (window.innerWidth < 1280) {
        $store.sidebar.setMobileOpen(false);
        $store.sidebar.isExpanded = false;
    } else {
        $store.sidebar.isMobileOpen = false;
        $store.sidebar.isExpanded = true;
    }
};
window.addEventListener('resize', checkMobile);">

    <x-common.preloader />

    <div class="min-h-screen xl:flex">
        @include('layouts.backdrop')
        @include('layouts.sidebar')

        <div class="flex-1 transition-all duration-300 ease-in-out"
            :class="{
                'xl:ml-72.5': $store.sidebar.isExpanded || $store.sidebar.isHovered,
                'xl:ml-22.5': !$store.sidebar.isExpanded && !$store.sidebar.isHovered,
                'ml-0': $store.sidebar.isMobileOpen
            }">
            @include('layouts.app-header')

            <main class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')

    @vite(['resources/js/app.js'])
</body>

</html>
