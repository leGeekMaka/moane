<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30">
                    <h6 class="mb-25">Dépôt <span class="badge bg-primary">500 000 FCFA</span></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select wire:model="operationId">
                                        <option selected disabled>Selectionner une Opération</option>
                                        @foreach($operations as $operation)
                                            <option value="{{$operation->id}}">{{$operation->libelle}}</option>
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
                        <input type="text" wire:model="price" placeholder="Montant"/>
                    </div>
                    <div class="text-center">
                        <button wire:click="store"
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
                    <h6 class="mb-25">Retrait <span class="badge bg-primary">500 000 FCFA</span></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select>
                                        <option selected value="">Retrait Client</option>
                                        <option value="">Autre retrait</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end input -->
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Transaction</label>
                                <div class="select-position">
                                    <select>
                                        <option value="">Mobile Money</option>
                                        <option value="">Oange Money</option>
                                        <option value="">Cash</option>
                                        <option value="">Express Union</option>
                                        <option value="">YUP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input -->
                    <div class="input-style-1">
                        <label>Libellé / Numéro</label>
                        <input type="text" placeholder="Libellé / Numéro"/>
                    </div>
                    <div class="input-style-1">
                        <label>Montant</label>
                        <input type="text" placeholder="Montant"/>
                    </div>
                    <div class="text-center">
                        <button class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div>
</div>
