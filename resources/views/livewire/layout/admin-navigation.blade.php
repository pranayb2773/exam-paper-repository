<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect("/", navigate: true);
    }
};
?>

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
                                    Academic Management</div>
                                <ul role="list" class="-mx-2 mt-2 space-y-1">
                                    <li>
                                        <a href="{{ route('admin.branches') }}" wire:navigate
                                           class="{{ request()->routeIs(['admin.branches', 'admin.branches.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
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
                                        <a href="{{ route('admin.exam-papers') }}" wire:navigate
                                           class="{{ request()->routeIs(['admin.exam-papers', 'admin.exam-papers.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                            <svg class="{{ request()->routeIs(['admin.exam-papers', 'admin.exam-papers.*']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                            {{ __('Exam Papers') }}
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
                            Academic Management</div>
                        <ul role="list" class="-mx-2 mt-2 space-y-1">
                            <li>
                                <a href="{{ route('admin.branches') }}" wire:navigate
                                   class="{{ request()->routeIs(['admin.branches', 'admin.branches.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                    <svg class="{{ request()->routeIs(['admin.branches', 'admin.branches.*']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                    </svg>
                                    {{ __('Branches') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.exam-papers') }}" wire:navigate
                                   class="{{ request()->routeIs(['admin.exam-papers', 'admin.exam-papers.*']) ? 'bg-primary-500 text-secondary-100' : 'text-secondary-700 dark:text-secondary-300 hover:text-primary-500 hover:bg-secondary-50 dark:hover:text-primary-500 dark:hover:bg-secondary-700' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                    <svg class="{{ request()->routeIs(['admin.exam-papers', 'admin.exam-papers.*']) ? 'text-secondary-100' : 'text-secondary-400 group-hover:text-primary-500 dark:text-secondary-500' }} h-6 w-6 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    {{ __('Exam Papers') }}
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

