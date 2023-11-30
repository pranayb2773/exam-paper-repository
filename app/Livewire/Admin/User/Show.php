<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public User $user;

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.user.show')
            ->layout('layouts.admin', [
                'title' => 'Show User',
                'description' => 'In this page, we will show user information.',
            ]);
    }
}
