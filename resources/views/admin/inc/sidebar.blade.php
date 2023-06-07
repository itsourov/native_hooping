<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 {{ 'hidden' }} w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">

                    <x-admin.sidebar-menu-item :active="request()->routeIs('admin.dashboard')" :href="route('admin.dashboard')">

                        <x-slot name="icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                </path>
                            </svg>
                        </x-slot>
                        <x-slot name="title">
                            {{ __('Dashboard') }}
                        </x-slot>


                    </x-admin.sidebar-menu-item>


                    <x-admin.sidebar-menu-item :active="request()->routeIs('admin.products*')" :dropdown="true">

                        <x-slot name="icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
                                </path>
                            </svg>
                        </x-slot>
                        <x-slot name="title">
                            {{ __('Products') }}
                        </x-slot>

                        <x-slot name="submenu">
                            <x-admin.sidebar-sub-menu-item :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                                View all Products
                            </x-admin.sidebar-sub-menu-item>
                            <x-admin.sidebar-sub-menu-item :href="route('admin.products.create')" :active="request()->routeIs('admin.products.create')">
                                Add new Product
                            </x-admin.sidebar-sub-menu-item>
                            <x-admin.sidebar-sub-menu-item :href="route('admin.products.categories')" :active="request()->routeIs('admin.products.categories')">
                                Categories
                            </x-admin.sidebar-sub-menu-item>
                        </x-slot>

                    </x-admin.sidebar-menu-item>





                    <x-admin.sidebar-menu-item :active="request()->routeIs('admin.orders*')" :dropdown="true">

                        <x-slot name="icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z">
                                </path>
                            </svg>
                        </x-slot>
                        <x-slot name="title">
                            {{ __('Orders') }}
                        </x-slot>

                        <x-slot name="submenu">
                            <x-admin.sidebar-sub-menu-item :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.index')">
                                View all Orders
                            </x-admin.sidebar-sub-menu-item>

                        </x-slot>

                    </x-admin.sidebar-menu-item>
                    <x-admin.sidebar-menu-item :active="request()->routeIs('admin.bkash*')" :dropdown="true">

                        <x-slot name="icon">
                            <x-svg.bdt-circle class="w-5 h-5" />
                        </x-slot>
                        <x-slot name="title">
                            {{ __('Bkash') }}
                        </x-slot>

                        <x-slot name="submenu">
                            <x-admin.sidebar-sub-menu-item :href="route('admin.bkash.transactions.index')" :active="request()->routeIs('admin.bkash.transactions.index')">
                                View all transaction
                            </x-admin.sidebar-sub-menu-item>
                            <x-admin.sidebar-sub-menu-item :href="route('admin.bkash.searchTransaction')" :active="request()->routeIs('admin.bkash.searchTransaction')">
                                Search transaction
                            </x-admin.sidebar-sub-menu-item>
                            <x-admin.sidebar-sub-menu-item :href="route('admin.bkash.refundStatus')" :active="request()->routeIs('admin.bkash.refundStatus')">
                                Refund Status
                            </x-admin.sidebar-sub-menu-item>

                        </x-slot>

                    </x-admin.sidebar-menu-item>


                    <x-admin.sidebar-menu-item :active="request()->routeIs('admin.users.index')" :href="route('admin.users.index')">

                        <x-slot name="icon">
                            <x-svg.users class="w-5 h-5" />
                        </x-slot>
                        <x-slot name="title">
                            {{ __('Users') }}
                        </x-slot>


                    </x-admin.sidebar-menu-item>

                </ul>

            </div>
        </div>

    </div>
</aside>
<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
