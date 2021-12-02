<?php

namespace App\Http\Livewire\Movements;

use App\Models\Operations;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CashRegister extends Component
{
    public $labelDeposit,
           $amountDeposit,
           $withdrawalOperationId = "",
           $withdrawalTransactionId = "" ,
           $depositOperationId = "",
           $depositTransactionId = "",
           $labelWithdrawal,
           $amountWithdrawal;
    const DEPOSIT = 1, WITHDRAWAL = 2;
    public function render()
    {
        return view('livewire.movements.cash-register',
            [
                'deposits' => Operations::where('operation_type', SELF::DEPOSIT)->get(),
                'withdrawals' => Operations::where('operation_type', SELF::WITHDRAWAL)->get(),
                'transactions' => Transaction::all(),
                'total_deposit_amount' => \App\Models\Movement::where('movement_type','deposit')->sum('amount'),
                'total_amount_withdrawn' => \App\Models\Movement::where('movement_type','withdrawal')->sum('amount'),
                'dailyDeposits' => \App\Models\Movement::whereDay('created_at',date('d'))->where('movement_type','deposit')->get(),
                'dailyWithdrawals' => \App\Models\Movement::whereDay('created_at',date('d'))->where('movement_type','withdrawal')->get(),
            ]);
    }

   /* public $rules = [
        'depositOperationId' => 'required',
        'depositTransactionId' => 'required',
        'amountDeposit' => 'required',
    ];*/

    public  function storeDeposit(){
        $this->validate([
            'depositOperationId' => 'required',
            'depositTransactionId' => 'required',
            'amountDeposit' => 'required',
        ]);
        $this->store("deposit",
                    $this->depositOperationId,
                    $this->depositTransactionId,
                    $this->labelDeposit,
                    $this->amountDeposit
                    );
                    $this->depositOperationId = "";
                    $this->depositTransactionId = "";
                    $this->labelDeposit = "";
                    $this->amountDeposit = "";
    }

    public function storeWithdrawal(){
       $this->validate([
           'withdrawalOperationId' => 'required',
           'withdrawalTransactionId' => 'required',
           'amountWithdrawal' => 'required',
       ]);
       $this->store("withdrawal",
                    $this->withdrawalOperationId,
                    $this->withdrawalTransactionId,
                    $this->labelWithdrawal,
                    $this->amountWithdrawal
                    );
                   $this->withdrawalOperationId = "";
                   $this->withdrawalTransactionId = "";
                   $this->labelWithdrawal = "";
                   $this->amountWithdrawal = "";
    }

    private function store($typeOperation, $operation, $transaction, $label, $amount) {
        try{
            \App\Models\Movement::create([
                'operation_id' => $operation,
                'transaction_id' => $transaction,
                'user_id' => 1,
                'movement_type' => $typeOperation,
                'label' => $label,
                'amount' => $amount
            ]);
            session()->flash('message', 'Transaction enregistreé avec succès.');
            $this->dispatchBrowserEvent('closeAlert');
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
        }
    }
}
