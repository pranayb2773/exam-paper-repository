<?php

namespace App\Livewire\Admin\Branch;

use App\Models\Branch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    public Branch $branch;

    public function mount(int $id): void
    {
        $this->branch = Branch::findOrFail($id);
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.branch.show')
            ->layout('layouts.admin', [
                'title' => 'Show Branch',
                'description' => 'In this page, we will show branch information.',
            ]);
    }
}
