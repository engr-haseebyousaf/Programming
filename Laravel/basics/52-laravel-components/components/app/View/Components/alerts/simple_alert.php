<?php

namespace App\View\Components\alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class simple_alert extends Component
{
    public $type;
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct($type = "warning", $message = "Please write some message")
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.simple_alert');
    }
}
