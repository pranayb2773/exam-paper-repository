<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout("layouts.guest", ["title" => "Confirm Password"])] class extends
    Component
{
    public string $password = "";

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            "password" => ["required", "string"],
        ]);

        if (
            !Auth::guard("web")->validate([
                "email" => Auth::user()->email,
                "password" => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                "password" => __("auth.password"),
            ]);
        }

        session(["auth.password_confirmed_at" => time()]);

        $this->redirect(
            session("url.intended", RouteServiceProvider::HOME),
            navigate: true
        );
    }
};
?>

<div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form wire:submit="confirmPassword">
        <!-- Password -->
        <div>
            <x-label.main for="password" :value="__('Password')" />

            <x-input.text wire:model="password"
                          id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          field="password"
                          required autocomplete="current-password" />
        </div>

        <div class="flex justify-end mt-4">
            <x-button.primary>
                {{ __('Confirm') }}
            </x-button.primary>
        </div>
    </form>
</div>
