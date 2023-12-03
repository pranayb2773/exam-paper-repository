<?php

namespace App\Livewire\Admin\Branch;

use App\Models\Branch;
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
 * @property Collection<Branch> $rows
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

    public function deleteBranches(): void
    {
        // Delete all subjects related to branches before deleting branches
        $this->selectedRows->get()->each(function (Branch $branch) {
            $branch->subjects()?->delete();
        });

        $this->selectedRows->delete();
        $this->dispatch('close-modal', 'confirm-branches-deletion');
        $this->reset(['selected', 'selectAll', 'selectPage']);
        $this->resetPage();

        $this->dispatch('notify', [
            'type' => 'success',
            'content' => 'Branch(es) delete successfully.'
        ]);
    }

    public function resetFilters(): void
    {
        $this->reset(['updatedAt', 'status']);
        $this->resetPage();
    }

    #[Computed]
    public function rowsQuery(): Builder
    {
        $query = Branch::withCount('subjects')
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
        return view('livewire.admin.branch.index', [
            'branches' => $this->rows,
        ])->layout('layouts.admin', [
            'title' => 'Branches',
            'description' => 'In this page, we will get the all branches information.',
        ]);
    }
}
