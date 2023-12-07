<div>
    <div class="space-y-4 mx-auto h-full w-full px-4 md:px-6 lg:px-8 max-w-7xl">
        <!-- Bread crumbs -->
        <x-breadcrumbs.main>
            <x-breadcrumbs.link href="{{ route('admin.exam-papers') }}">{{ __('Exam Papers') }}</x-breadcrumbs.link>
            <x-breadcrumbs.link>{{ __('Create') }}</x-breadcrumbs.link>
        </x-breadcrumbs.main>

        <!-- Page Header -->
        <header class="items-end justify-between space-y-2 sm:flex sm:space-x-4 sm:space-y-0 sm:rtl:space-x-reverse">
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl sm:text-3xl tracking-tight font-bold text-secondary-900 dark:text-secondary-100">{{ __('Add Exam Paper') }}</h1>
            </div>
        </header>

        <!-- Form Details -->
        <div>
            <div class="grid auto-cols-fr gap-y-8">
                <form wire:submit.prevent="create" class="grid gap-y-6">
                    <div class="form-content grid gap-6">
                        <div class="grid gap-6">
                            <!-- Exam Paper Details -->
                            <div class="">
                                <section
                                    class="rounded-xl bg-white shadow-sm ring-1 ring-secondary-900/5 dark:bg-secondary-800 dark:ring-white/10">
                                    <div class="p-6">
                                        <div class="grid gap-6 grid-cols-1 lg:grid-cols-3">
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="name"
                                                              :required="true"> {{ __('Name') }}</x-label.main>
                                                <x-input.text wire:model.blur="name" id="name"
                                                              class="w-full mt-1" field="name"></x-input.text>
                                            </div>
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="type" :required="true"> {{ __('Type') }}</x-label.main>
                                                <x-input.select wire:model.live="type" id="type" class="w-full mt-1" field="type">
                                                    <option value="">Select a exam paper type</option>
                                                    @foreach(\App\Enums\ExamPaper\Type::cases() as $type)
                                                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                                                    @endforeach
                                                </x-input.select>
                                            </div>
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="status" :required="true"> {{ __('Status') }}</x-label.main>
                                                <x-input.select wire:model.live="status" id="status" class="w-full mt-1" field="status">
                                                    <option value="">Select a exam paper status</option>
                                                    @foreach(\App\Enums\Subject\Status::cases() as $status)
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
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="branch" :required="true"> {{ __('Branch') }}</x-label.main>
                                                <x-input.select wire:model.live="branch" id="branch" class="w-full mt-1" field="branch">
                                                    <option value="">Select a branch</option>
                                                    @foreach($branchOptions as $branchOption)
                                                        <option value="{{ $branchOption['value'] }}">{{ $branchOption['label'] }}</option>
                                                    @endforeach
                                                </x-input.select>
                                            </div>
                                            <div class="col-span-3 lg:col-span-1">
                                                <x-label.main for="subject" :required="true"> {{ __('Subject') }}</x-label.main>
                                                <x-input.select wire:model.live="subject" id="subject" class="w-full mt-1" field="subject">
                                                    <option value="">Select a subject</option>
                                                    @foreach($subjectOptions as $subjectOption)
                                                        <option value="{{ $subjectOption['value'] }}">{{ $subjectOption['label'] }}</option>
                                                    @endforeach
                                                </x-input.select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="grid gap-6">
                            <!-- Exam Paper Details -->
                            <div class="">
                                <section
                                    class="rounded-xl bg-white shadow-sm ring-1 ring-secondary-900/5 dark:bg-secondary-800 dark:ring-white/10">
                                    <header class="flex gap-x-3 items-center overflow-hidden px-6 py-4">
                                        <h3 class="text-base font-semibold leading-6 text-secondary-900">
                                            Attachment
                                        </h3>
                                    </header>
                                    <div class="border-t border-secondary-200">
                                        <div class="p-6">
                                            <div class="grid gap-6 grid-cols-1">
                                                <div class="col-span-full">
                                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed px-6 py-10 {!! ($errors->has('file') ? 'border-danger-500' : 'border-secondary-900/25') !!}">
                                                        <div class="text-center">
                                                            <svg class="mx-auto h-10 w-10 text-secondary-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                                            </svg>

                                                            <div class="mt-4 flex text-sm leading-6 text-secondary-600">
                                                                <label for="file" class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500">
                                                                    @if($file)
                                                                        <span>{{ $file->getClientOriginalName() }} </span>
                                                                    @else
                                                                        <span>Upload a file</span>
                                                                    @endif
                                                                    <input wire:model="file" id="file" name="file" type="file" class="sr-only">
                                                                </label>
                                                                <p class="pl-1">or drag and drop</p>
                                                            </div>
                                                            <p class="text-xs leading-5 text-secondary-600">PDF up to 10MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('file')
                                                    <span class="text-xs text-danger-600">{{ $message }}</span>
                                                @enderror
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
                            <x-button.primary>{{ __('Create') }}</x-button.primary>
                            <x-button.secondary wire:click="createAnother" type="button">{{ __('Create Another') }}</x-button.secondary>
                            <x-button.link-danger wire:navigate href="{{ route('admin.exam-papers') }}" alt="Cancel">{{ __('Cancel') }}</x-button.link-danger>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
