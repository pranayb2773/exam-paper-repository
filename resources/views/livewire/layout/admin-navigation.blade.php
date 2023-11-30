<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
    <div x-show="open" class="relative z-50 lg:hidden"
         x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
         aria-modal="true" style="display: none;">
        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 bg-secondary-900/80"
             x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." style="display: none;">
        </div>
        <div class="fixed inset-0 flex">
            <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                 x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                 class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false" style="display: none;">
                <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     x-description="Close button, show/hide based on off-canvas menu state."
                     class="absolute left-full top-0 flex w-16 justify-center pt-5" style="display: none;">
                    <button type="button" class="-m-2.5 hidden p-2.5" @click="open = false">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="h-6 w-6 text-white dark:text-secondary-400" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white pb-4 dark:bg-secondary-800">
                    <div class="flex h-16 shrink-0 items-center px-6">
                        <x-logo.main />
                    </div>
                    <div
                        class="-mt-5 h-px bg-gradient-to-r from-secondary-100 via-primary-300 to-secondary-100 dark:from-secondary-700 dark:via-primary-300 dark:to-secondary-700">
                    </div>
                    <nav class="flex flex-1 flex-col px-6">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1">
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}" wire:navigate
                                           class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                            <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                                </path>
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z">
                                                </path>
                                            </svg>
                                            Team
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
                                                </path>
                                            </svg>
                                            Projects
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5">
                                                </path>
                                            </svg>
                                            Calendar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75">
                                                </path>
                                            </svg>
                                            Documents
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"></path>
                                            </svg>
                                            Reports
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div
                                    class="text-xs font-semibold leading-6 text-secondary-400 dark:text-secondary-300">
                                    User Management</div>
                                <ul role="list" class="-mx-2 mt-2 space-y-1">
                                    <li>
                                        <a href="{{ route('admin.users') }}" wire:navigate
                                           class="{{ request()->routeIs(['admin.users', 'admin.users.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                            <svg class="{{ request()->routeIs(['admin.users', 'admin.users.*']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                            </svg>
                                            {{ __('Users') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.auth.profile') }}" wire:navigate
                                           class="{{ request()->routeIs(['admin.auth.profile']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                            <svg class="{{ request()->routeIs(['admin.auth.profile']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>

                                            {{ __('My Profile') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div
                                    class="text-xs font-semibold leading-6 text-secondary-400 dark:text-secondary-300">
                                    Your teams
                                </div>
                                <ul role="list" class="-mx-2 mt-2 space-y-1">
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state:on="Current" x-state:off="Default"
                                           x-state-description="Current: &quot;bg-secondary-50 text-primary-500&quot;, Default: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <span
                                                class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">H</span>
                                            <span class="truncate">Heroicons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <span
                                                class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">T</span>
                                            <span class="truncate">Tailwind Labs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                           x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                            <span
                                                class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">W</span>
                                            <span class="truncate">Workcation</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div
            class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-secondary-200 bg-white pb-4 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-100">
            <div class="flex h-16 shrink-0 items-center px-6">
                <x-logo.main />
            </div>
            <div
                class="-mt-5 h-px bg-gradient-to-r from-secondary-100 via-primary-300 to-secondary-100 dark:from-secondary-700 dark:via-primary-300 dark:to-secondary-700">
            </div>
            <nav class="flex flex-1 flex-col px-6">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <a href="{{ route('admin.dashboard') }}" wire:navigate
                                   class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                    <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                        </path>
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z">
                                        </path>
                                    </svg>
                                    Team
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z">
                                        </path>
                                    </svg>
                                    Projects
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5">
                                        </path>
                                    </svg>
                                    Calendar
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                    Documents
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <svg class="h-6 w-6 shrink-0 text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"></path>
                                    </svg>
                                    Reports
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <div class="text-xs font-semibold leading-6 text-secondary-400 dark:text-secondary-300">User
                            Management</div>
                        <ul role="list" class="-mx-2 mt-2 space-y-1">
                            <li>
                                <a href="{{ route('admin.users') }}" wire:navigate
                                   class="{{ request()->routeIs(['admin.users', 'admin.users.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                    <svg class="{{ request()->routeIs(['admin.users', 'admin.users.*']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                    {{ __('Users') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.auth.profile') }}" wire:navigate
                                   class="{{ request()->routeIs(['admin.auth.profile']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                    <svg class="{{ request()->routeIs(['admin.auth.profile']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>

                                    {{ __('My Profile') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="text-xs font-semibold leading-6 text-secondary-400 dark:text-secondary-300">Your
                            teams</div>
                        <ul role="list" class="-mx-2 mt-2 space-y-1">
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state:on="Current" x-state:off="Default"
                                   x-state-description="Current: &quot;bg-secondary-50 text-primary-500&quot;, Default: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">H</span>
                                    <span class="truncate">Heroicons</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">T</span>
                                    <span class="truncate">Tailwind Labs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-secondary-700 hover:bg-secondary-50 hover:text-primary-500 dark:text-secondary-300 dark:hover:bg-secondary-700 dark:hover:text-primary-500"
                                   x-state-description="undefined: &quot;bg-secondary-50 text-primary-500&quot;, undefined: &quot;text-secondary-700 hover:text-primary-500 hover:bg-secondary-50&quot;">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-secondary-200 bg-white text-[0.625rem] font-medium text-secondary-400 group-hover:border-primary-500 group-hover:text-primary-500 dark:border-secondary-600 dark:bg-secondary-800 dark:text-secondary-500">W</span>
                                    <span class="truncate">Workcation</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="lg:pl-72">
        <div class="sticky top-0 z-40 bg-white dark:bg-secondary-800 lg:mx-auto">
            <div
                class="flex h-16 items-center gap-x-4 border-b border-secondary-200 bg-white px-4 shadow-sm dark:border-secondary-700 dark:bg-secondary-800 sm:gap-x-6 sm:px-6 lg:px-0 lg:shadow-none">
                <button type="button" class="-m-2.5 p-2.5 text-secondary-700 dark:text-secondary-400 lg:hidden"
                        @click="open = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </button>

                <!-- Separator -->
                <div class="h-6 w-px bg-secondary-200 dark:bg-secondary-700 lg:hidden" aria-hidden="true"></div>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6 lg:px-8">
                    <div class="relative flex flex-1"></div>

                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <!-- Profile dropdown -->
                        <x-dropdown.main id="user-profile" align="right" width="w-60">
                            <x-slot:trigger>
                                <img alt="profile" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(auth()->user()->email)) }}"
                                     class="h-8 w-8 cursor-pointer rounded-full border border-secondary-200 object-cover" />
                            </x-slot:trigger>
                            <x-slot:content>
                                <div class="px-2 py-2.5" role="none">
                                    <p class="text-xs dark:text-secondary-500" role="none">Signed in as</p>
                                    <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name" class="truncate text-sm font-bold text-gray-900 dark:text-gray-100"></div>
                                </div>
                                <div class="mx-0 my-1 h-px bg-secondary-100 dark:bg-secondary-700"></div>
                                <x-dropdown.link href="{{ route('admin.auth.profile') }}" class="font-normal text-sm space-x-3">
                                    <x-icon.bell class="text-secondary-400" />
                                    <span>{{ __('Profile') }}</span>
                                </x-dropdown.link>
                                <x-dropdown.button wire:click="logout" class="font-normal text-sm space-x-3">
                                    <x-icon.arrow-right-on-rectangle class="text-secondary-400" />
                                    <span>{{ __('Logout') }}</span>
                                </x-dropdown.button>
                            </x-slot:content>
                        </x-dropdown.main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
