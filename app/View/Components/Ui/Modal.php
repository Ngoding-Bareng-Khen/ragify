<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $isOpen = false,
        public bool $showCloseButton = true,
        public bool $isFullscreen = false,
        public ?string $modalId = null,
    ) {
        $this->modalId ??= 'modal-' . uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.modal');
    }
}
