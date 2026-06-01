<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropzone extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = 'documents',
        public bool $multiple = true,
        public string $accept = '.pdf,.txt,.doc,.docx,application/pdf,text/plain,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.dropzone');
    }
}
