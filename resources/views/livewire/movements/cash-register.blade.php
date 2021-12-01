<div xmlns:wire="http://www.w3.org/1999/xhtml">

    <div class="form-elements-wrapper">
        <div class="row">
            @if(session()->has('message'))
                <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('message')}} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30">
                    <h6 class="mb-25">Total Dépôt <span class="badge bg-primary">{{$total_deposit_amount}} FCFA</span></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select wire:model="operationId">
                                        <option selected disabled>Selectionner une Opération</option>
                                        @foreach($deposits as $deposit)
                                            <option value="{{$deposit->id}}">{{$deposit->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end input -->
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Transaction</label>
                                <div class="select-position">
                                    <select wire:model="transactionId">
                                        <option disabled selected>selectionner une transaction</option>
                                        @foreach($transactions as $transaction)
                                            <option value="{{$transaction->id}}">{{$transaction->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input -->
                    <div class="input-style-1">
                        <label>Libellé / Numéro</label>
                        <input type="text" wire:model="label" placeholder="Libellé / Numéro"/>
                    </div>
                    <div class="input-style-1">
                        <label>Montant</label>
                        <input type="text" wire:model="amount" placeholder="saisir le montant"/>
                    </div>
                    <div class="text-center">
                        <button wire:click="storeDeposit"
                                class="main-btn active-btn-outline rounded-md btn-hover">Enregistrer
                        </button>
                    </div>

                </div>
                <!-- end card -->
            </div>
            <!-- end col  -->

            {{-- Fin depôt --}}

            <div class="col-lg-6">
                <div class="card-style mb-30">
                    <h6 class="mb-25">Total Retrait <span class="badge bg-primary">{{$total_amount_withdrawn}} FCFA</span></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select wire:model="operationId">
                                        <option disabled selected>Selectionner une Opération</option>
                                        @foreach($withdrawals as $withdrawal)
                                            <option value="{{$withdrawal->id}}">{{$withdrawal->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end input -->
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Transaction</label>
                                <div class="select-position">
                                    <select wire:model="transactionId">
                                        <option disabled selected>selectionner une transaction</option>
                                        @foreach($transactions as $transaction)
                                            <option value="{{$transaction->id}}">{{$transaction->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input -->
                    <div class="input-style-1">
                        <label>Libellé / Numéro</label>
                        <input type="text" wire:model="labelWithdrawal" placeholder="Libellé / Numéro"/>
                    </div>
                    <div class="input-style-1">
                        <label>Montant</label>
                        <input type="text" wire:model="amountWithdrawal" placeholder="Montant"/>
                    </div>
                    <div class="text-center">
                        <button wire:click="storeWithdrawal" class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('closeAlert',closeAlert);
        function closeAlert(){
            setTimeout(()=>{
                let alertNode = document.querySelector('#alert-message');
                let alert = new bootstrap.Alert(alertNode);
                alert.close()
            },3000)
        }
    </script>
@endpush
