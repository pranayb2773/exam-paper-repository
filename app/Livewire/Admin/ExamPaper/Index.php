<?php

namespace App\Livewire\Admin\ExamPaper;

use App\Models\ExamPaper;
use App\Traits\WithBulkActions;
use App\Traits\WithPerPagePagination;
use App\Traits\WithSorting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property Collection<ExamPaper> $rows
 * @property Builder $rowsQuery
 * @property Builder $selectedRows
 */
class Index extends Component
{
    use WithSorting;
    use WithPerPagePagination;
    use WithBulkActions;

    public string $search = '';
    public string $updatedAt = '';
    public string $status = '';


    public function resetFilters(): void
    {
        $this->reset(['updatedAt', 'status']);
        $this->resetPage();
    }

    public function deleteExamPapers(): void
    {
        $this->selectedRows->delete();
        $this->dispatch('close-modal', 'confirm-exam-papers-deletion');
        $this->reset(['selected', 'selectAll', 'selectPage']);
        $this->resetPage();

        $this->dispatch('notify', [
            'type' => 'success',
            'content' => 'Exam Paper(s) delete successfully.'
        ]);
    }

    #[Computed]
    public function rowsQuery(): Builder
    {
        $query = ExamPaper::with(['subject.Branch'])
            ->when($this->search, fn(Builder $query, $search) => $query->whereLike(['name'], $search))
            ->when($this->updatedAt, fn(Builder $query, $updatedAt) => $query->whereLike('updated_at', Carbon::parse($updatedAt)->format('Y-m-d')))
            ->when($this->status, fn(Builder $query, $status) => $query->where('status', $status));

        return $this->applySorting($query);
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return $this->applyPagination($this->rowsQuery);
    }
    public function render(): Application|Factory|View
    {
        return view('livewire.admin.exam-paper.index', [
            'examPapers' => $this->rows,
        ])->layout('layouts.admin', [
            'title' => 'Exam Papers',
            'description' => 'In this page, we will get the all exam papers information.',
        ]);
    }
}
