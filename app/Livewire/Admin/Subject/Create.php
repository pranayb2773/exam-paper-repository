<?php

namespace App\Livewire\Admin\Subject;

use App\Enums\Subject\Status;
use App\Models\Branch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public Branch $branch;
    public string $name = '';
    public string $code = '';
    public string $description = '';
    public string $status = '';
    public int $semister;

    protected function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'min:3', 'max:255',
                Rule::unique('subjects', 'name')
                    ->where('code', $this->code)
                    ->where('branch_id', $this->branch->id)
            ],
            'code' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['sometimes', 'string'],
            'semister' => ['required', 'int', 'min:0', 'max:8'],
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

        $this->branch->subjects()->create([
            'name' => $this->name,
            'code' => $this->code,
            'Description' => $this->description,
            'semister' => $this->semister,
            'status' => $this->status
        ]);

        /*$this->dispatch('notify', [
            'type' => 'success',
            'content' => 'Subject Created Successfully.'
        ]);*/

        $this->closeModalWithEvents([
            'subject-created',
            [
                'notify', [['type' => 'success', 'content' => 'Subject Created Successfully.']]
            ]
        ]);
    }

    public function createAnother(): void
    {
        $this->validate();

        $this->branch->subjects()->create([
            'name' => $this->name,
            'code' => $this->code,
            'Description' => $this->description,
            'semister' => $this->semister,
            'status' => $this->status
        ]);

        $this->dispatch('subject-created');
        $this->dispatch('notify', [
            'type' => 'success', 'content' => 'Subject Created Successfully.'
        ]);

        $this->resetExcept(['branch']);
    }


    public function render(): Application|Factory|View
    {
        return view('livewire.admin.subject.create')
            ->layout('layouts.admin', [
                'title' => 'Create Subject',
                'description' => 'In this page, we will show subject information.',
            ]);
    }
}
