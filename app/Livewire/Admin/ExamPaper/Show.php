<?php

namespace App\Livewire\Admin\ExamPaper;

use App\Models\ExamPaper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    public ExamPaper $examPaper;

    public function mount(int $id): void
    {
        $this->examPaper = ExamPaper::with(['subject.Branch'])->findOrFail($id);
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.admin.exam-paper.show')
            ->layout('layouts.admin', [
                'title' => 'Show Exam Paper',
                'description' => 'In this page, we will show exam paper information.',
            ]);
    }
}
