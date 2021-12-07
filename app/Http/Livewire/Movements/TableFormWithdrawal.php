<?php

namespace App\Http\Livewire\Movements;

use Livewire\Component;

class TableFormWithdrawal extends Component
{
    public $withdrawal;
    public $withdrawals, $transactions;

    protected $rules = [
    
        'withdrawal.amount' => 'required',
        'withdrawal.label' => 'required',
        'withdrawal.operation_id' => 'required',
        'withdrawal.transaction_id' => 'required',
    ];
    public function render()
    {
        return view('livewire.movements.table-form-withdrawal');
    }

    public function update(){
        $this->validate([
            'withdrawal.amount' => 'required',
            'withdrawal.operation_id' => 'required',
            'withdrawal.transaction_id' => 'required',
        ]);
        $this->withdrawal->save();
        $this->emit('movementUpdated');
    }

    public function cancel(){
        $this->emit('movementUpdated');
    }
}
