<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use App\Models\Transaction as Trans;
use Illuminate\Support\Facades\Log;
class Transaction extends Component
{
    public $libelle, $edit = "false", $transactionId = "";

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.transactions.transaction',
            ['transactions' => Trans::orderByDesc('created_at')->get()]);
    }

    protected $rules = [
        'libelle' => 'required|max:100|unique:transactions'
    ];

    public function store(){
        $this->validate();
        try{
            Trans::create(['libelle' => $this->libelle]);
            $this->libelle = "";
            $this->emit('closeModal');
            $this->dispatchBrowserEvent('closeAlert');
            session()->flash('message', 'Sauvegarde reussie.');
        }catch (\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModal');
        }
    }

    public function edit($transactionId){
        $this->edit = "true";
        $operation = Trans::find($transactionId);
        $this->libelle = $operation->libelle;
        $this->transactionId = $operation->id;
    }
    public function update(){
        $this->validate();
        try{
            Trans::find($this->transactionId)->update(['libelle' => $this->libelle]);
            $this->edit = "false";
            $this->libelle = "";
            $this->transactionId = null;
            $this->emit('closeModal');
            $this->dispatchBrowserEvent('closeAlert');
            session()->flash('message', 'Mise à jour reussie.');
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModal');
        }
    }
    public function getId($transactionId){

        try{
           $transaction = $this->transactionId = Trans::find($transactionId);
           $this->libelle = $transaction->libelle;
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModalDestroy');
        }
    }
    public function destroy(){

        try{
            Trans::find($this->transactionId->id)->delete();
            $this->transactionId = null;
            $this->libelle = "";
            $this->emit('closeModalDestroy');
            $this->dispatchBrowserEvent('closeAlert');
            session()->flash('message', 'suppression reussie.');
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue essayer de nouveau.');
            $this->emit('closeModalDestroy');
        }
    }
    public function cancel(){
        $this->edit = "false";
        $this->libelle = "";
        $this->transactionId = null;
    }
}
