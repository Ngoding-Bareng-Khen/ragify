<header class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900 xl:border-b">
    <div class="flex grow flex-col items-center justify-between xl:flex-row xl:px-6">
        <div class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 dark:border-gray-800 sm:gap-4 lg:py-4 xl:justify-normal xl:border-b-0 xl:px-0">
            <x-ui.button
                variant="custom"
                size="none"
                className="hidden h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-500 dark:border-gray-800 dark:text-gray-400 lg:h-11 lg:w-11 xl:flex"
                x-bind:class="{ 'bg-gray-100 dark:bg-white/3': !$store.sidebar.isExpanded }"
                x-on:click="$store.sidebar.toggleExpanded()"
                aria-label="Toggle Sidebar">
                <i class="fa-solid fa-bars"></i>
            </x-ui.button>

            <x-ui.button
                variant="custom"
                size="none"
                className="flex h-10 w-10 items-center justify-center rounded-lg text-gray-500 dark:text-gray-400 lg:h-11 lg:w-11 xl:hidden"
                x-bind:class="{ 'bg-gray-100 dark:bg-white/3': $store.sidebar.isMobileOpen }"
                x-on:click="$store.sidebar.toggleMobileOpen()"
                aria-label="Toggle Mobile Menu">
                <i x-show="!$store.sidebar.isMobileOpen" class="fa-solid fa-bars"></i>
                <i x-show="$store.sidebar.isMobileOpen" class="fa-solid fa-xmark"></i>
            </x-ui.button>

            <a href="{{ route('app.dashboard') }}" class="xl:hidden">
                <img class="dark:hidden" src="/images/logo/logo.svg" alt="Ragify" />
                <img class="hidden dark:block" src="/images/logo/logo-dark.svg" alt="Ragify" />
            </a>

            <div class="hidden xl:block">
                <div class="relative">
                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 dark:text-gray-400"></i>
                    </span>
                    <input
                        type="text"
                        placeholder="Search..."
                        class="dark:bg-dark-900 h-11 w-90 rounded-lg border border-gray-200 bg-transparent py-2.5 pl-12 pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-800 dark:bg-white/3 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                </div>
            </div>
        </div>

        <div class="flex w-full items-center justify-end gap-3 px-5 py-4 shadow-theme-md xl:w-auto xl:px-0 xl:shadow-none">
            <x-ui.button
                variant="custom"
                size="none"
                className="flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                x-on:click="$store.theme.toggle()"
                aria-label="Toggle Theme">
                <span x-show="$store.theme.theme === 'dark'" class="inline-flex">
                    <i class="fa-regular fa-sun"></i>
                </span>
                <span x-show="$store.theme.theme !== 'dark'" class="inline-flex">
                    <i class="fa-regular fa-moon"></i>
                </span>
            </x-ui.button>

            <x-ui.dropdown-menu align="right" width="56">
                <x-slot name="trigger">
                    <x-ui.button
                        variant="custom"
                        size="none"
                        className="flex items-center gap-3 rounded-full border border-gray-200 bg-white px-3 py-2 dark:border-gray-800 dark:bg-gray-900">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-50 text-sm font-semibold text-brand-500 dark:bg-brand-500/20 dark:text-brand-400">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        <span class="hidden text-sm font-medium text-gray-700 text-nowrap dark:text-gray-300 sm:block">{{ auth()->user()->name }}</span>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                    </x-ui.button>
                </x-slot>

                <form method="POST" action="{{ route('auth.sign-out') }}">
                    @csrf
                    <x-ui.button
                        type="submit"
                        variant="custom"
                        size="none"
                        className="flex w-full items-center justify-start gap-2 rounded-lg px-3 py-2 text-theme-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-white">
                        <i class="fa-solid fa-right-from-bracket text-gray-400"></i>
                        Logout
                    </x-ui.button>
                </form>
            </x-ui.dropdown-menu>
        </div>
    </div>
</header>
