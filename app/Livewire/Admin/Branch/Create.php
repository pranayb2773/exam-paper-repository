<?php

namespace App\Livewire\Admin\Branch;

use App\Enums\Branch\Status;
use App\Models\Branch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $description = '';
    public string $status = '';
    public int $noOfSemisters = 8;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('branches', 'name')],
            'description' => ['sometimes', 'string'],
            'noOfSemisters' => ['required', 'int', 'min:0', 'max:8'],
            'status' => ['required', 'string', Rule::in(Status::cases())],
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function create(): void
    {
        $this->validate();

        $branch = Branch::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'no_of_semisters' => $this->noOfSemisters
        ]);

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'Branch Created Successfully.'
        ]);

        $this->redirectRoute('admin.branches');
    }

    public function createAnother(): void
    {
        $this->validate();

        Branch::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'no_of_semisters' => $this->noOfSemisters
        ]);

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'Branch Created Successfully.'
        ]);

        $this->redirectRoute('admin.branches.create');
    }



    public function render(): Application|Factory|View
    {
        return view('livewire.admin.branch.create')
            ->layout('layouts.admin', [
                'title' => 'Create Branch',
                'description' => 'In this page, we will create new branch.',
            ]);
    }
}
