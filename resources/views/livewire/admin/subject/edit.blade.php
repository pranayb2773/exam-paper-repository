<div>
    <div class="relative bg-white rounded-lg shadow dark:bg-secondary-800">
        <!-- Modal header -->
        <div>
            <div class="flex justify-between items-center py-4 px-6 dark:border-secondary-600">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-secondary-900 dark:text-white">{{ __('Edit '. $subject->name) }}</h3>
                </div>
                <button type="button" wire:click="$dispatch('closeModal')" tabindex="-1"
                        class="absolute right-0 top-0 mr-3 mt-3 flex h-8 w-8 items-center justify-center rounded-full text-secondary-600 transition duration-150 ease-in-out hover:bg-secondary-50 hover:text-secondary-800 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Modal body -->
        <div class="max-h-[65vh] overflow-y-auto">
            <div class="border-t border-secondary-200 dark:border-secondary-700">
                <!-- Form Details -->
                <div>
                    <div class="grid">
                        <form wire:submit.prevent="save" class="flex flex-col">

                            <section class="">
                                <div class="p-6">
                                    <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                                        <div class="col-span-2 lg:col-span-1">
                                            <x-label.main for="subject.name"
                                                          :required="true"> {{ __('Name') }}</x-label.main>
                                            <x-input.text wire:model.blur="subject.name" id="subject.name"
                                                          class="w-full mt-1" field="subject.name"></x-input.text>
                                        </div>
                                        <div class="col-span-2 lg:col-span-1">
                                            <x-label.main for="subject.code"
                                                          :required="true"> {{ __('Code') }}</x-label.main>
                                            <x-input.text wire:model.blur="subject.code" id="subject.code"
                                                          class="w-full mt-1" field="subject.code"></x-input.text>
                                        </div>
                                        <div class="col-span-2 lg:col-span-1">
                                            <x-label.main for="subject.semister" :required="true"> {{ __('Semisters') }}</x-label.main>
                                            <x-input.text
                                                wire:model.blur="subject.semister" id="subject.semister" type="number" min="0" max="8"
                                                class="w-full mt-1" field="subject.semister"
                                            ></x-input.text>
                                        </div>
                                        <div class="col-span-2 lg:col-span-1">
                                            <x-label.main for="subject.status" :required="true"> {{ __('Status') }}</x-label.main>
                                            <x-input.select wire:model.live="subject.status" id="subject.status" class="w-full mt-1" field="subject.status">
                                                <option value="">Select a branch status</option>
                                                @foreach(\App\Enums\Subject\Status::cases() as $status)
                                                    <option value="{{ $status->value }}">{{ $status->label() }}</option>
                                                @endforeach
                                            </x-input.select>
                                        </div>
                                        <div class="col-span-2">
                                            <x-label.main for="subject.Description"> {{ __('Description') }}</x-label.main>
                                            <x-input.text-area
                                                wire:model.blur="subject.Description" id="subject.Description"
                                                class="w-full mt-1" field="subject.Description"
                                            >{{ $subject->Description }}</x-input.text-area>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Form Action Buttons -->
                            <div class="form-actions p-6 pt-0">
                                <div class="flex flex-wrap items-center justify-start space-x-3">
                                    <x-button.primary>{{ __('Save Changes') }}</x-button.primary>
                                    <x-button.danger
                                        wire:click="delete" type="button"
                                    >{{ __('Delete') }}</x-button.danger>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
