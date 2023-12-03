<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{
    public Subject $subject;

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.subject.show')
            ->layout('layouts.admin', [
                'title' => 'Show Subject',
                'description' => 'In this page, we will show subject information.',
            ]);
    }
}
