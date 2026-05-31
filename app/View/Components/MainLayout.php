<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    public $title;

    public function __construct($title = 'НарушенийНЕТ')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('layouts.main');
    }
}