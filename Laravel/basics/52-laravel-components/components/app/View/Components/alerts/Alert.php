<?php

namespace App\View\Components\alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $dismissable;
    protected $types = ["success", "warning", "info", "success", "light"];
    /**
     * Create a new component instance.
     */
    public function __construct($type="warning", $message="Nothing is in the message", $dismissable=false)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dismissable = $dismissable;
    }
    public function typeCheck(){
        return in_array($this->type, $this->types) ? $this->type : "danger";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.alert');
    }
}
