<?php

namespace App\Http\Livewire\Report;



use App\Models\Movement;
use App\Models\Operations;
use App\Models\Transaction;
use Livewire\Component;

class Report extends Component
{

    public function render()
    {
        return view('livewire.report.report',
            [
                'movements' => Movement::all(),
                'total_deposit' => Movement::where('movement_type','deposit')
                                   ->whereDay('created_at', date('d'))
                                   ->sum('amount'),
                'operations' => Operations::all(),
                'transactions' => Transaction::all(),
            ]);
    }
}
