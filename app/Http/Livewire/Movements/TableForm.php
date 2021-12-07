<?php

namespace App\Http\Livewire\Movements;

use Livewire\Component;

class TableForm extends Component
{
    public $deposits;
    public $deposit;
    public $transactions;
    
    protected $rules = [
        'deposit.amount' => 'required',
        'deposit.operation_id' => 'required',
        'deposit.transaction_id' => 'required',
        'deposit.label' => 'required',
    ];
    public function render()
    {
        return view('livewire.movements.table-form');
    }

    public function update(){

        $this->validate([
            'deposit.amount' => 'required',
            'deposit.operation_id' => 'required',
            'deposit.transaction_id' => 'required',
        ]);
        $this->deposit->save();
        $this->emit('movementUpdated');
    }
}
