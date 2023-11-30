<?php

namespace App\Livewire\Admin\User;

use App\Enums\User\Status;
use App\Enums\User\Type;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public User $user;
    public array $typeOptions = [];
    public array $statusOptions = [];

    protected function rules(): array
    {
        return [
            'user.name' => ['required', 'string', 'min:3', 'max:255'],
            'user.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignoreModel($this->user)],
            'user.type' => ['required', 'string', Rule::in(Type::cases())],
            'user.status' => ['required', 'string', Rule::in(Status::cases())],
        ];
    }

    public function mount(int $id): void
    {
        $this->user = User::findOrFail($id);

        // Use it for dropdown in edit user page
        foreach (Type::cases() as $typeOption) {
            $this->typeOptions[] = ['value' => $typeOption->value, 'label' => $typeOption->label()];
        }

        // Use it for dropdown in edit user page
        foreach (Status::cases() as $statusOption) {
            $this->statusOptions[] = ['value' => $statusOption->value, 'label' => $statusOption->label()];
        }
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function save(): void
    {
        $this->user->save();

        // Dispatch event
        $this->dispatch('notify', [
            'type' => 'success',
            'content' => 'User Updated Successfully.'
        ]);
    }

    public function delete(): void
    {
        $this->user->delete();

        // Dispatch event
        session()->flash('notify', [
            'type' => 'success',
            'content' => 'User Deleted Successfully.'
        ]);

        // Redirect Users listing page
        $this->redirectRoute('admin.users');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.user.edit')
            ->layout('layouts.admin', [
                'title' => 'Edit User',
                'description' => 'In this page, we will edit existing user.',
            ]);
    }
}
