@php
    $menuItems = [
        [
            'name' => 'Dashboard',
            'path' => route('app.dashboard'),
            'active' => request()->routeIs('app.dashboard'),
            'icon' => 'fa-regular fa-chart-bar',
        ],
        [
            'name' => 'AI Chat',
            'path' => route('app.ai-chat'),
            'active' => request()->routeIs('app.ai-chat'),
            'icon' => 'fa-regular fa-comment-dots',
        ],
        [
            'name' => 'Knowledge Source',
            'path' => route('app.knowledge-source'),
            'active' => request()->routeIs('app.knowledge-source'),
            'icon' => 'fa-regular fa-folder-closed',
        ],
    ];
@endphp

<aside
    id="sidebar"
    class="fixed left-0 top-0 z-99999 flex h-screen flex-col border-r border-gray-200 bg-white px-5 text-gray-900 transition-all duration-300 ease-in-out dark:border-gray-800 dark:bg-gray-900"
    :class="{
        'w-[290px]': $store.sidebar.isExpanded || $store.sidebar.isMobileOpen || $store.sidebar.isHovered,
        'w-[90px]': !$store.sidebar.isExpanded && !$store.sidebar.isHovered,
        'translate-x-0': $store.sidebar.isMobileOpen,
        '-translate-x-full xl:translate-x-0': !$store.sidebar.isMobileOpen
    }"
    @mouseenter="if (!$store.sidebar.isExpanded) $store.sidebar.setHovered(true)"
    @mouseleave="$store.sidebar.setHovered(false)">
    <div
        class="flex pb-7 pt-8"
        :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ? 'xl:justify-center' : 'justify-start'">
        <a href="{{ route('app.dashboard') }}">
            <img
                x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                class="dark:hidden"
                src="/images/logo/logo.svg"
                alt="Ragify"
                width="150"
                height="40" />
            <img
                x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                class="hidden dark:block"
                src="/images/logo/logo-dark.svg"
                alt="Ragify"
                width="150"
                height="40" />
            <img
                x-show="!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen"
                src="/images/logo/logo-icon.svg"
                alt="Ragify"
                width="32"
                height="32" />
        </a>
    </div>

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <nav class="mb-6">
            <h2
                class="mb-4 flex text-xs uppercase leading-[20px] text-gray-400"
                :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ? 'lg:justify-center' : 'justify-start'">
                <span x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen">Menu</span>
                <span x-show="!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen">
                    <i class="fa-solid fa-ellipsis"></i>
                </span>
            </h2>

            <ul class="flex flex-col gap-2">
                @foreach ($menuItems as $item)
                    <li>
                        <a
                            href="{{ $item['path'] }}"
                            class="menu-item group {{ $item['active'] ? 'menu-item-active' : 'menu-item-inactive' }}"
                            :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ? 'xl:justify-center' : 'justify-start'">
                            <span class="{{ $item['active'] ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}">
                                <i class="{{ $item['icon'] }} w-6 text-center text-xl"></i>
                            </span>
                            <span
                                x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                                class="menu-item-text">
                                {{ $item['name'] }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
