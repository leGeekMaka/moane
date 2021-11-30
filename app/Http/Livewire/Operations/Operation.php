<?php

namespace App\Http\Livewire\Operations;

use App\Models\Operations;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
class Operation extends Component
{
    // edit: variable qui permet d'afficher le bouton modifier
    //operationId: de recupere l'objet operation et je l'affecte à cette variable
    public $libelle, $edit = "false", $operationsId = "",$operationType;
    const DEPOSIT = 1, WITHDRAWAL = 2;

    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.operations.operation',[
            'operations' => Operations::orderByDesc('created_at')->get()
        ]);
    }

    protected $rules = [
        'libelle' => 'required|max:100|unique:operations'
    ];


    public function store(){

        $this->validate();
        try{
            Operations::create(['libelle' => $this->libelle, 'operation_type' => $this->operationType]);
            $this->libelle = "";
            $this->operationType = "";
            $this->emit('closeModal');
            $this->dispatchBrowserEvent('closeAlert');
            session()->flash('message', 'Sauvegarde reussie.');
        }catch (\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModal');
        }
    }

    /**
     * @param $operationId
     */
    public function edit($operationId)  {
        $this->edit = "true";
        $operation = Operations::find($operationId);
        $this->libelle = $operation->libelle;
        $this->operationsId = $operation->id;
    }

    public function update(){

        $this->validate();
        try{
            Operations::find($this->operationsId)->update(['libelle' => $this->libelle, 'operation_type' => $this->operationType]);
            $this->edit = "false";
            $this->libelle = "";
            $this->operationType = "";
            $this->operationsId = null;
            $this->emit('closeModal');
            $this->dispatchBrowserEvent('closeAlert');
            session()->flash('message', 'Mise à jour reussie.');
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModal');
        }

    }


    /**
     * @param $operationId
     * on recupère l'id de l'operation à supprimer
     */
    public function getId($operationId){

        try{
           $operation = $this->operationsId = Operations::find($operationId);
           $this->libelle = $operation->libelle;
        }catch(\Exception $e){
            Log::error(sprintf('%d'.$e->getMessage(), __METHOD__));
            session()->flash('error', 'oups une erreur est survenue, veuillez actualiser et essayer à nouveau.');
            $this->emit('closeModalDestroy');
        }
    }


    public function destroy(){

        try{
            Operations::find($this->operationsId->id)->delete();
            $this->operationsId = null;
            $this->libelle = "" ;
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
        $this->operationType = "";
        $this->operationsId = null;
    }
}
