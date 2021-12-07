<td colspan="5">
    <form class="row g-3" wire:submit.prevent="update">
        <div class="col-auto">
            <div class="select-style-1">
                <label>Type d'opération</label>
                <div class="select-position">
                    <select wire:model.defer="withdrawal.operation_id">
                        @foreach ($withdrawals as $withdrawa )
                        @if ($withdrawa->id == $withdrawal->operation_id)
                        <option selected value="{{$withdrawa->id}}">{{$withdrawa->libelle}}</option>
                        @else
                        <option value="{{$withdrawa->id}}">{{$withdrawa->libelle}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="input-style-1">
                <label>Montant</label>
                <input type="text" wire:model.defer="withdrawal.amount" />
            </div>

        </div>
        <div class="col-auto">
            <div class="select-style-1">
                <label>Transaction</label>
                <div class="select-position">
                    <select wire:model.defer="withdrawal.transaction_id">
                        @foreach ($transactions as $transaction )
                        @if ($transaction->id == $withdrawal->transaction_id)
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
                <input type="text" wire:model.defer="withdrawal.label" />
            </div>
        </div>
        <div class="col-auto mt-5">
            <button type="submit" wire:loading.attr="disabled" class="main-btn active-btn-outline rounded-md btn-hover input-style-1">Modifier</button>
            <button wire:click="cancel" class="main-btn dark-btn-outline rounded-md btn-hover input-style-1">Annuler</button>
        </div>
    </form>
</td>