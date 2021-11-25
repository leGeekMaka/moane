<?php

namespace App\Http\Livewire\Operations;

use App\Models\Operations;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Operation extends Component
{

    public $libelle, $operation, $edit, $operationsId;
//    protected $listeners = ['closeModal'];

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
        Operations::create(['libelle' => $this->libelle]);
        $this->libelle = "";
        $this->emit('closeModal');
        session()->flash('message', 'Sauvegarde reussie.');
    }

    public function edit($operationId)  {
        $this->edit = "true";
        $operation = Operations::find($operationId);
        $this->libelle = $operation->libelle;
        $this->operationsId = $operation->id;
    }

    public function update(){

        $this->validate();
        try{
            Operations::find($this->operationsId)->update(['libelle' => $this->libelle]);
                $this->edit = "false";
                $this->libelle = "";
                $this->operationsId = "";
                $this->emit('closeModal');
                session()->flash('message', 'Mise à jour reussie.');

        }catch(QueryException $e){
            session()->flash('error', 'oups une erreur est survenue essayer de nouveau.');
            $this->emit('closeModal');
        }

    }

    public function destroy(){

    }

    public function cancel(){
        $this->edit = "false";
        $this->libelle = "";
        $this->operationsId = "";
    }
}
