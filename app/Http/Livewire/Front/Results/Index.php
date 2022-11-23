<?php

namespace App\Http\Livewire\Front\Results;

use App\Models\Test;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Test())->orderable;
    }

    public function render()
    {
        $query = Test::with(['quiz', 'questions'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ])->where('user_id', Auth::user()->id);

        $results = $query->paginate($this->perPage);

        return view('livewire.front.results.index', compact('query', 'results'));
    }
}
