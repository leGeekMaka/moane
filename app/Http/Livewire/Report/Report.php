<?php

namespace App\Http\Livewire\Report;


use App\Models\Movement;
use Livewire\Component;

class Report extends Component
{

    public function render()
    {
        return view('livewire.report.report',
            [
                'movements' => Movement::all(),
            ]);
    }
}
