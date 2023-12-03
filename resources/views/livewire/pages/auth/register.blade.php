<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout("layouts.guest", ["title" => "Register"])] class extends Component
{
    public string $name = "";
    public string $email = "";
    public string $password = "";
    public string $password_confirmation = "";

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:" . User::class,
            ],
            "password" => [
                "required",
                "string",
                "confirmed",
                Rules\Password::defaults(),
            ],
        ]);

        $validated["password"] = Hash::make($validated["password"]);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
};
?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-label.main for="name" :value="__('Name')" />
            <x-input.text wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" field="name" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label.main for="email" :value="__('Email')" />
            <x-input.text wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" field="name" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label.main for="password" :value="__('Password')" />

            <x-input.text wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            field="name" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label.main for="password_confirmation" :value="__('Confirm Password')" />

            <x-input.text wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" field="name" required autocomplete="new-password" />

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-button.primary class="ms-4">
                {{ __('Register') }}
            </x-button.primary>
        </div>
    </form>
</div>
