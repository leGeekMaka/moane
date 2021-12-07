<td colspan="5">
    <form class="row g-3" wire:submit.prevent="update">
        <div class="col-auto">
            <div class="select-style-1">
                <label>Type d'opération</label>
                <div class="select-position">
                    <select wire:model.defer="deposit.operation_id">
                        @foreach ($deposits as $depo )
                        @if ($depo->id == $deposit->operation_id)
                        <option selected value="{{$depo->id}}">{{$depo->libelle}}</option>
                        @else
                        <option value="{{$depo->id}}">{{$depo->libelle}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="input-style-1">
                <label>Montant</label>
                <input type="text" wire:model.defer="deposit.amount" placeholder="" />
            </div>
        </div>
        <div class="col-auto">
            <div class="select-style-1">
                <label>Transaction</label>
                <div class="select-position">
                    <select wire:model.defer="deposit.transaction_id">
                        @foreach ($transactions as $transaction )
                        @if ($transaction->id == $deposit->transaction_id)
                        <option selected value="{{$transaction->id }}">{{$transaction->libelle}}</option>
                        @else
                        <option value="{{$transaction->id }}">{{$transaction->libelle}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="input-style-1">
                <label>Libellé</label>
                <input type="text" wire:model.defer="deposit.label" />
            </div>
        </div>
        <div class="col-auto mt-5">
            <button type="submit" wire:loading.attr="disabled" class="main-btn active-btn-outline rounded-md btn-hover input-style-1">Modifier</button>
            <button wire:click="cancel" class="main-btn dark-btn-outline rounded-md btn-hover input-style-1">Annuler</button>
        </div>
    </form>
</td>