<?php

namespace App\View\Components;

use App\Models\Status;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    public $statuses;
    public $sort;
    public $status;

    public function __construct()
    {
        $this->statuses = Status::all();
        $this->sort = request('sort', 'desc');
        $this->status = request('status');
    }

    public function render(): View|Closure|string
    {
        $statuses = Status::all();
        return view('components.filter', compact('statuses'));
    }
}