<?php

namespace App\View\Components\alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class SlotAlert extends Component
{
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($type="light")
    {
        $this->type = $type;
    }

    public function link($content, $target="#", $page="_self"){
        return new HtmlString("<a href='".$target."' target='{$page}' class='alert-link'>".$content."</a>");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.slot-alert');
    }
}
