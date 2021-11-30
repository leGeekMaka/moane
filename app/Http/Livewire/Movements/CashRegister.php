<?php

namespace App\Http\Livewire\Movements;

use App\Models\Operations;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CashRegister extends Component
{
    public $label, $amount, $operationId = "", $transactionId = "";

    public function render()
    {
        return view('livewire.movements.cash-register',
            [
                'operations' => Operations::all(),
                'transactions' => Transaction::all(),
                'total_amount' => \App\Models\Movement::where('movement_type','deposit')->sum('amount'),
            ]);
    }

    public $rules = [
        'operationId' => 'required',
        'transactionId' => 'required',
        'amount' => 'required|'
    ];

    public  function storeDeposit(){

        $this->validate();

        try{
            \App\Models\Movement::create([
                'operation_id' => $this->operationId,
                'transaction_id' => $this->transactionId,
                'user_id' => 1,
                'movement_type' => "deposit",
                'label' => $this->label,
                'amount' => $this->amount
            ]);
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
        }


        $this->operationId = "";
        $this->transactionId = "";
        $this->label = "";
        $this->amount = "";
        session()->flash('message', 'Transaction enregistreé avec succès.');
        $this->dispatchBrowserEvent('closeAlert');
    }
}
