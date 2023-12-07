<div>
    <div class="space-y-4 mx-auto h-full w-full px-4 md:px-6 lg:px-8 max-w-7xl">
        <!-- Bread crumbs -->
        <x-breadcrumbs.main>
            <x-breadcrumbs.link href="{{ route('admin.exam-papers') }}">{{ __('Exam Papers') }}</x-breadcrumbs.link>
            <x-breadcrumbs.link>{{ __($examPaper->name) }}</x-breadcrumbs.link>
        </x-breadcrumbs.main>

        <!-- Page Header -->
        <header class="items-end justify-between space-y-2 sm:flex sm:space-x-4 sm:space-y-0 sm:rtl:space-x-reverse">
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl sm:text-3xl tracking-tight font-bold text-secondary-900 dark:text-secondary-100">{{ __('View ' . $examPaper->name) }}</h1>
            </div>

            <!-- Add Action -->
            <div class="flex shrink-0 flex-wrap items-center justify-start gap-4">
                <x-button.link-primary
                    wire:navigate
                    href="{{ route('admin.exam-papers.edit', [$examPaper->id]) }}"
                    class="text-sm normal-case"
                >
                    {{ __('Edit Exam Paper') }}
                </x-button.link-primary>
            </div>
        </header>

        <div>
            <div class="grid auto-cols-fr gap-y-8">
                <div class="grid gap-6">
                    <!-- User Details -->
                    <div class="">
                        <section
                            class="rounded-xl bg-white shadow-sm ring-1 ring-secondary-900/5 dark:bg-secondary-800 dark:ring-white/10">
                            <div class="p-6">
                                <div class="grid gap-6 grid-cols-1 lg:grid-cols-3">
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Name') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->name }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Type') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->type->label() }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Status') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->status->label() }}</span>
                                    </div>
                                    <div class="col-span-3">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Description') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->description }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="subject" class="font-semibold"> {{ __('Subject') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->subject->name }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="semister" class="font-semibold"> {{ __('Semister') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->subject->semister }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="branch" class="font-semibold"> {{ __('Branch') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->subject?->Branch?->name }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Created At') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->created_at->format('F j, Y g:i a') }}</span>
                                    </div>
                                    <div class="col-span-3 lg:col-span-1">
                                        <x-label.main for="name" class="font-semibold"> {{ __('Updated At') }}</x-label.main>
                                        <span class="mt-2 text-sm text-secondary-700 dark:text-white">{{ $examPaper->updated_at->format('F j, Y g:i a') }}</span>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <object data="{{ asset($examPaper->file_path) }}" class="w-full h-[100vh]">
                    <p>Unable to display exam paper.</p>
                </object>
            </div>
        </div>
    </div>
</div>
