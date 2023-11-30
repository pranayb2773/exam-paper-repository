<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ $description ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div
    class="min-h-screen overflow-y-auto bg-secondary-100 text-secondary-900 dark:bg-secondary-900 dark:text-secondary-100">
    <div x-data="{ open: false }" @keydown.window.escape="open = false">
        <livewire:layout.admin-navigation></livewire:layout.admin-navigation>

        <div class="lg:pl-72">
            <main class="overflow-y-auto bg-secondary-100 py-6 dark:bg-secondary-900"
                  style="height: calc(100vh - 4rem);">
                <div class="mx-auto max-w-full">
                    <div>
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<x-notification.main></x-notification.main>

@if(session()->has('notify'))
    <div x-data="{
        init () {
            this.$nextTick(() => {
                this.$dispatch('notify', {{ json_encode([session('notify')]) }});
            })
        }
    }"></div>
@endif

@livewire('wire-elements-modal')
</body>
</html>
