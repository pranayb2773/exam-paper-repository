<?php

namespace App\Livewire\Admin\Branch;

use App\Enums\Branch\Status;
use App\Models\Branch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Branch $branch;

    protected $queryString = [];

    protected function rules(): array
    {
        return [
            'branch.name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('branches', 'name')->ignoreModel($this->branch)],
            'branch.description' => ['sometimes', 'string'],
            'branch.no_of_semisters' => ['required', 'int', 'min:0', 'max:8'],
            'branch.status' => ['required', 'string', Rule::in(Status::cases())],
        ];
    }

    public function mount(int $id): void
    {
        $this->branch = Branch::findOrFail($id);
    }

    public function save(): void
    {
        $this->branch->save();

        // Dispatch event
        $this->dispatch('notify', [
            'type' => 'success',
            'content' => 'Branch Updated Successfully.'
        ]);
    }

    public function delete(): void
    {
        $this->branch->delete();

        // Dispatch event
        session()->flash('notify', [
            'type' => 'success',
            'content' => 'Branch Deleted Successfully.'
        ]);

        // Redirect Users listing page
        $this->redirectRoute('admin.branches');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.branch.edit')
            ->layout('layouts.admin', [
                'title' => 'Edit Branch',
                'description' => 'In this page, we will edit existing branch.',
            ]);
    }
}
