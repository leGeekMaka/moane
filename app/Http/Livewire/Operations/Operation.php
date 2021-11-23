<?php

namespace App\Http\Livewire\Operations;

use App\Models\Operations;
use Livewire\Component;

class Operation extends Component
{
    public function render()
    {
        return view('livewire.operations.operation',[
            'operations' => Operations::orderByDesc('created_at')->get()
        ]);
    }

    public function store(){
        
    }
}
