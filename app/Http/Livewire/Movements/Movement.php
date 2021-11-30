<?php

namespace App\Http\Livewire\Movements;

use App\Models\Operations;
use App\Models\Transaction;
use App\Models\Movement as Movmt;
use Livewire\Component;
class Movement extends Component
{
    public $label, $price, $operationId = "", $transactionId = "";

    public function render()
    {
        return view('livewire.movements.movement',
            [
                'operations' => Operations::all(),
                'transactions' => Transaction::all(),
            ]);
    }

    public $rules =[
        'operationId' => 'required',
        'transactionId' => 'required',
         'price' => 'required|'
    ];

    public function store(){

        $this->validate();
        dd();
        Movmt::create([
            'operation_id' => $this->operationId,
            'transaction_id' => $this->transactionId,
            'user_id' => 1,
            'label' => $this->label,
            'price' => $this->price
        ]);

        $this->operationId = "";
        $this->transactionId = "";
        $this->label = "";
        $this->price = "";
    }

    public function storeWithdrawal(){}

    /*public function store(){}*/
}
