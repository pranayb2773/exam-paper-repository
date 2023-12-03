<div>
    <div class="space-y-4 mx-auto h-full w-full px-4 md:px-6 lg:px-8 max-w-7xl">
        <!-- Bread crumbs -->
        <x-breadcrumbs.main>
            <x-breadcrumbs.link href="{{ route('admin.branches') }}">{{ __('Branches') }}</x-breadcrumbs.link>
            <x-breadcrumbs.link>{{ $branch->name }}</x-breadcrumbs.link>
            <x-breadcrumbs.link>{{ __('Edit') }}</x-breadcrumbs.link>
        </x-breadcrumbs.main>

        <!-- Page Header -->
        <header class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl sm:text-3xl tracking-tight font-bold text-secondary-900 dark:text-secondary-100">{{ __('Edit') . ' ' . $branch->name  }}</h1>
            </div>
            <div class="gap-3 flex flex-wrap items-center justify-start shrink-0">
                <x-button.danger type="button" @click="$dispatch('open-modal', 'confirm-branch-deletion')">{{ __('Delete') }}</x-button.danger>
            </div>
        </header>

        <!-- Form Details -->
        <div>
            <div class="grid auto-cols-fr gap-y-8">
                <form wire:submit.prevent="save" class="grid gap-y-6">
                    <div class="form-content grid gap-6 grid-cols-1 lg:grid-cols-3">
                        <div class="col-span-3 lg:col-span-2 grid gap-6">
                            <!-- User Details -->
                            <div class="">
                                <section
                                    class="rounded-xl bg-white shadow-sm ring-1 ring-secondary-900/5 dark:bg-secondary-800 dark:ring-white/10">
                                    <div class="p-6">
                                        <div class="grid gap-6 grid-cols-1 lg:grid-cols-3">
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="name"
                                                              :required="true"> {{ __('Name') }}</x-label.main>
                                                <x-input.text wire:model.blur="branch.name" id="name"
                                                              class="w-full mt-1" field="branch.name"></x-input.text>
                                            </div>
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="branch.no_of_semisters" :required="true"> {{ __('No of Semisters') }}</x-label.main>
                                                <x-input.text
                                                    wire:model.blur="branch.no_of_semisters" id="branch.no_of_semisters"
                                                    class="w-full mt-1" field="branch.no_of_semisters" type="number" min="0" max="8"
                                                ></x-input.text>
                                            </div>
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="branch.status" :required="true"> {{ __('Status') }}</x-label.main>
                                                <x-input.select wire:model.live="branch.status" id="branch.status" class="w-full mt-1" field="branch.status">
                                                    <option value="">Select a branch status</option>
                                                    @foreach(\App\Enums\Branch\Status::cases() as $status)
                                                        <option value="{{ $status->value }}">{{ $status->label() }}</option>
                                                    @endforeach
                                                </x-input.select>
                                            </div>
                                            <div class="col-span-3">
                                                <x-label.main for="branch.description"> {{ __('Description') }}</x-label.main>
                                                <x-input.text-area
                                                    wire:model.blur="branch.description" id="branch.description"
                                                    class="w-full mt-1" field="branch.description"
                                                >{{ $branch->description }}</x-input.text-area>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-span-3 lg:col-span-1">
                            <div>
                                <section
                                    class="rounded-xl bg-white shadow-sm ring-1 ring-secondary-900/5 dark:bg-secondary-800 dark:ring-white/10">
                                    <div class="p-6">
                                        <div class="grid gap-6 grid-cols-1">
                                            <div>
                                                <x-label.main for="createAt" class="font-semibold dark:text-white"> {{ __('Created At') }}</x-label.main>
                                                <div id="createAt" class="text-sm mt-1 text-gray-700 dark:text-white">{{ $branch->created_at?->diffForHumans() }}</div>
                                            </div>
                                            <div>
                                                <x-label.main for="updatedAt" class="font-semibold dark:text-white"> {{ __('Last Modified At') }}</x-label.main>
                                                <div id="updatedAt" class="text-sm mt-1 text-gray-700 dark:text-white">{{ $branch->updated_at?->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                    <!-- Form Action Buttons -->
                    <div class="form-actions">
                        <div class="gap-3 flex flex-wrap items-center justify-start">
                            <x-button.primary>{{ __('Save Changes') }}</x-button.primary>
                            <x-button.link-danger wire:navigate href="{{ route('admin.branches') }}" alt="Cancel">{{ __('Cancel') }}</x-button.link-danger>
                        </div>
                    </div>
                </form>

                <livewire:admin.subject.index :branch="$branch" />
            </div>
        </div>
    </div>

    <!-- User(s) Delete Confirmation Modal -->
    <x-modal.main name="confirm-branch-deletion" :show="false" focusable>
        <form wire:submit="delete" class="p-6">

            <div class="flex items-center justify-between pb-3">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete branch: ' . $branch->name . '?') }}
                </h2>
                <button type="button" x-on:click="$dispatch('close')"
                        class="absolute right-0 top-0 mr-5 mt-5 flex h-8 w-8 items-center justify-center rounded-full text-gray-600 transition duration-150 ease-in-out hover:bg-gray-50 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once branch deleted, all of branch data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-button.secondary x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button.secondary>

                <x-danger-button class="ml-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal.main>
</div>
