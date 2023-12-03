<div>
    <div class="space-y-4 mx-auto h-full w-full px-4 md:px-6 lg:px-8 max-w-7xl">
        <!-- Bread crumbs -->
        <x-breadcrumbs.main>
            <x-breadcrumbs.link href="{{ route('admin.branches') }}">{{ __('Branches') }}</x-breadcrumbs.link>
            <x-breadcrumbs.link>{{ __('Create') }}</x-breadcrumbs.link>
        </x-breadcrumbs.main>

        <!-- Page Header -->
        <header class="items-end justify-between space-y-2 sm:flex sm:space-x-4 sm:space-y-0 sm:rtl:space-x-reverse">
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl sm:text-3xl tracking-tight font-bold text-secondary-900 dark:text-secondary-100">{{ __('Create Branches') }}</h1>
            </div>
        </header>

        <!-- Form Details -->
        <div>
            <div class="grid">
                <form wire:submit.prevent="create" class="flex flex-col space-y-6">

                    <section class="bg-white shadow rounded-lg border border-secondary-900/5">
                        <div class="p-6">
                            <div class="grid gap-6 grid-cols-1 lg:grid-cols-3">
                                <div class="col-span-3 lg:col-span-1">
                                    <x-label.main for="name"
                                                  :required="true"> {{ __('Name') }}</x-label.main>
                                    <x-input.text wire:model.blur="name" id="name"
                                                  class="w-full mt-1" field="name"></x-input.text>
                                </div>
                                <div class="col-span-3 lg:col-span-1">
                                    <x-label.main for="noOfSemisters" :required="true"> {{ __('No of Semisters') }}</x-label.main>
                                    <x-input.text
                                        wire:model.blur="noOfSemisters" id="noOfSemisters" type="number" min="0" max="8"
                                        class="w-full mt-1" field="noOfSemisters"
                                    ></x-input.text>
                                </div>
                                <div class="col-span-3 lg:col-span-1">
                                    <x-label.main for="status" :required="true"> {{ __('Status') }}</x-label.main>
                                    <x-input.select wire:model.live="status" id="status" class="w-full mt-1" field="status">
                                        <option value="">Select a branch status</option>
                                        @foreach(\App\Enums\Branch\Status::cases() as $status)
                                            <option value="{{ $status->value }}">{{ $status->label() }}</option>
                                        @endforeach
                                    </x-input.select>
                                </div>
                                <div class="col-span-3">
                                    <x-label.main for="description"> {{ __('Description') }}</x-label.main>
                                    <x-input.text-area
                                        wire:model.blur="description" id="description"
                                        class="w-full mt-1" field="description"
                                    >{{ $description }}</x-input.text-area>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Form Action Buttons -->
                    <div class="form-actions">
                        <div class="flex flex-wrap items-center justify-start space-x-3">
                            <x-button.primary>{{ __('Create') }}</x-button.primary>
                            <x-button.secondary
                                wire:click="createAnother" type="button"
                            >{{ __('Create & Create Another') }}</x-button.secondary>
                            <x-button.link-danger
                                wire:navigate href="{{ route('admin.branches') }}" alt="Cancel"
                            >{{ __('Cancel') }}</x-button.link-danger>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
