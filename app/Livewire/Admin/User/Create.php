<?php

namespace App\Livewire\Admin\User;

use App\Enums\User\Status;
use App\Enums\User\Type;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $type = '';
    public string $status = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::unique('users', 'email')],
            'type' => ['required', 'string', Rule::in(Type::cases())],
            'status' => ['required', 'string', Rule::in(Status::cases())],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function create(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'status' => $this->status,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'User Created Successfully.'
        ]);

        $this->redirectRoute('admin.users');
    }

    public function createAnother(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'status' => $this->status,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'User Created Successfully.'
        ]);

        $this->redirectRoute('admin.users.create');
    }


    public function render(): Application|Factory|View
    {
        return view('livewire.admin.user.create')
            ->layout('layouts.admin', [
                'title' => 'Create User',
                'description' => 'In this page, we will create new user.',
            ]);
    }
}
