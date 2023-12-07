<?php

namespace App\Livewire\Admin\Subject;

use App\Enums\Subject\Status;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public Subject $subject;

    protected function rules(): array
    {
        return [
            'subject.name' => [
                'required', 'string', 'min:3', 'max:255',
                Rule::unique('subjects', 'name')
                    ->where('code', $this->subject->code)
                    ->where('branch_id', $this->subject->branch_id)
                    ->ignoreModel($this->subject)
            ],
            'subject.code' => ['required', 'string', 'min:3', 'max:255'],
            'subject.Description' => ['sometimes', 'string'],
            'subject.semister' => ['required', 'int', 'min:0', 'max:8'],
            'subject.status' => ['required', 'string', Rule::in(Status::cases())],
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function save(): void
    {
        $this->subject->save();

        $this->closeModalWithEvents(['subject-created']);

        // Dispatch event
        $this->dispatch('notify', [
            'type' => 'success',
            'content' => 'Subject Updated Successfully.'
        ]);
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.subject.edit')
            ->layout('layouts.admin', [
                'title' => 'Edit Subject',
                'description' => 'In this page, we will edit existing subject.',
            ]);
    }
}
