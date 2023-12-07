<?php

namespace App\Livewire\Admin\ExamPaper;

use App\Enums\ExamPaper\Type;
use App\Enums\Subject\Status;
use App\Models\Branch;
use App\Models\ExamPaper;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $description = '';
    public string $status = '';
    public string $type = '';
    public ?int $subject = null;
    public ?int $branch = null;
    public $file;
    public array $subjectOptions = [];
    public array $branchOptions = [];

    public function mount(): void
    {
        $this->branchOptions = $this->getBranchOptions;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['sometimes', 'string'],
            'status' => ['required', 'string', Rule::in(Status::cases())],
            'type' => ['required', 'string', Rule::in(Type::cases())],
            'subject' => ['required', 'int', Rule::exists('subjects', 'id')],
            'branch' => ['required', 'int', Rule::exists('branches', 'id')],
            'file' => ['required', File::types('pdf')->max(10 * 1024)]
        ];
    }

    public function updatedBranch(): void
    {
        $this->subjectOptions = $this->getSubjectOptions;
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    #[Computed]
    public function getSubjectOptions(): array
    {
        return Subject::select(['id as value', 'name as label'])
            ->when($this->branch, fn(Builder $query) => $query->where('branch_id', $this->branch), fn(Builder $query) => $query->whereNull('branch_id'))
            ->get()->toArray();
    }

    #[Computed]
    public function getBranchOptions(): array
    {
        return Branch::select(['id as value', 'name as label'])->get()->toArray();
    }

    public function create(): void
    {
        $this->validate();

        $examPaper = ExamPaper::create([
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status,
            'subject_id' => $this->subject
        ]);

        $path = $this->file->storeAs('public/exam-papers/'.$examPaper->id, $this->file->getClientOriginalName());

        $examPaper->file_path = 'storage/exam-papers/'.$examPaper->id.'/'.$this->file->getClientOriginalName();
        $examPaper->save();

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'Exam Paper Added Successfully.'
        ]);

        $this->redirectRoute('admin.exam-papers');
    }

    public function createAnother(): void
    {
        $this->validate();

        $examPaper = ExamPaper::create([
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status,
            'subject_id' => $this->subject
        ]);

        $path = $this->file->storeAs('public/exam-papers/'.$examPaper->id, $this->file->getClientOriginalName());

        $examPaper->file_path = 'storage/exam-papers/'.$examPaper->id.'/'.$this->file->getClientOriginalName();
        $examPaper->save();

        session()->flash('notify', [
            'type' => 'success',
            'content' => 'Exam Paper Added Successfully.'
        ]);

        $this->redirectRoute('admin.exam-papers.create');
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.exam-paper.create')
            ->layout('layouts.admin', [
                'title' => 'Create Exam Paper',
                'description' => 'In this page, we will create new exam paper.',
            ]);
    }
}
