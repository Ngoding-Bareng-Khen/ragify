<?php

namespace App\View\Components\Data;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Data Table',
        public string $description = '',
        public string $searchPlaceholder = 'Search...',
        public string $filterLabel = 'Filter',
        public string $filterModalId = 'data-table-filter-modal',
        public bool $showSearch = true,
        public bool $showFilter = true,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.data-table');
    }
}
