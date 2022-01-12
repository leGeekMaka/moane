<?php

namespace App\Http\Livewire\Movements;

use App\Models\Balance;
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
           $amountWithdrawal,
           $searchLabelAndAmountDeposit,
           $searchLabelAndAmountWithdrawal,
           $balance,
           $balanceAmount,
           $previousBalance,
           $editId, $bal;

    const DEPOSIT = 1, WITHDRAWAL = 2;

    public function mount(){
        $bal = Balance::whereDay('created_at', date('d'))->first();

        if (is_null($bal)){
            $previousBalance = Balance::latest('id')->first();
            $this->balanceAmount = optional($previousBalance)->balance;
            $this->previousBalance = $this->balanceAmount;
        }

        if (! is_null($bal)){
             $this->balanceAmount = optional($bal)->balance;
             $previousBalance = Balance::whereDay('created_at','<', date('d'))->first();
             $this->previousBalance = optional($previousBalance)->balance;
        }

    }
//    public function updated(){
//
//        $this
//    }
    public function render()
    {
        return view('livewire.movements.cash-register',
            [
                'deposits' => Operations::where('operation_type', SELF::DEPOSIT)->get(),
                'withdrawals' => Operations::where('operation_type', SELF::WITHDRAWAL)->get(),
                'transactions' => Transaction::all(),
                'balances' => Balance::whereDay('created_at', date('d'))->first(),
                'total_deposit_amount' => \App\Models\Movement::where('movement_type','deposit')
                                                                ->whereDay('created_at', date('d'))
                                                                ->sum('amount'),
                'total_amount_withdrawn' => \App\Models\Movement::where('movement_type','withdrawal')
                                                                ->whereDay('created_at', date('d'))
                                                                ->sum('amount'),
                'dailyDeposits' => \App\Models\Movement::whereDay('created_at',date('d'))
                                                        ->where('movement_type','deposit')
                                                        ->where(function($query){
                                                         $query->where('label','LIKE',"%{$this->searchLabelAndAmountDeposit}%");
                                                         $query->orWhere('amount','LIKE',"%{$this->searchLabelAndAmountDeposit}%");
                                                         })
                                                        ->orderBy('created_at', 'DESC')->paginate(10),
                'dailyWithdrawals' => \App\Models\Movement::whereDay('created_at',date('d'))
                                                          ->where('movement_type','withdrawal')
                                                          ->where(function($query){
                                                            $query->where('label','LIKE',"%{$this->searchLabelAndAmountWithdrawal}%");
                                                            $query->orWhere('amount','LIKE',"%{$this->searchLabelAndAmountWithdrawal}%");
                                                           })
                                                          ->orderBy('created_at', 'DESC')->paginate(10),
            ]);
    }

    protected $listeners = [
        'movementUpdated' => 'onMovementUpdate'
    ];

    public function onMovementUpdate(){

        $this->reset('editId');
    }
   /* public $rules = [
        'depositOperationId' => 'required',
        'depositTransactionId' => 'required',
        'amountDeposit' => 'required',
    ];*/

    public $messages = [
        'depositOperationId.required' => 'veuillez choisir le type d\'operation.',
        'depositTransactionId.required' => 'veuillez choisir le type de transaction.',
        'amountDeposit.required' => 'veuillez saisir le montant.',
    ];

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

            $this->bal = Balance::whereDay('created_at',date('d'))->first();

            if (is_null($this->bal)){
                $this->bal = Balance::create(['balance' => $this->previousBalance + $amount]);
            }
            else{
                if ($typeOperation == "withdrawal")
                  $this->bal = tap($this->bal)->update(['balance' => $this->bal->balance - $amount]) ;
                else
                  $this->bal = tap($this->bal)->update(['balance' => $this->bal->balance + $amount]) ;
            }

            \App\Models\Movement::create([
                'operation_id' => $operation,
                'transaction_id' => $transaction,
                'balance_id' => $this->bal->id,
                'user_id' => 1,
                'movement_type' => $typeOperation,
                'label' => $label,
                'amount' => $amount,
            ]);
            $this->balanceAmount = $this->bal->balance;

            session()->flash('message', 'Transaction enregistreé avec succès.');
            $this->dispatchBrowserEvent('closeAlert');
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
        }
    }

    public function edit($id){
        $this->editId = $id;
    }
}
