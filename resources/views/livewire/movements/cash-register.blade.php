<div xmlns:wire="http://www.w3.org/1999/xhtml">

    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Solde veuille</h6>
                        @if($previousBalance > 0)
                            <h6 class="text-bold mb-10">{{$previousBalance}} FCFA</h6>
                            @elseif($previousBalance == 0)
                            <h6 class="text-bold mb-10">{{'0'}} FCFA</h6>
                            @elseif($previousBalance < 0)
                            <h6 class="text-bold mb-10 text-danger">{{$previousBalance}} FCFA</h6>
                        @endif
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Solde actuel</h6>
                        @if($balanceAmount > 0)
                        <h6 class="text-bold mb-10">{{ $balanceAmount }} FCFA</h6>
                            @elseif($balanceAmount == 0)
                        <h6 class="text-bold mb-10">{{'0'}} FCFA</h6>
                        @elseif($balanceAmount < 0)
                        <h6 class="text-bold mb-10 text-danger">{{ $balanceAmount }} FCFA</h6>
                        @endif
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Dépôt</h6>
                        <h6 class="text-bold mb-10">{{$total_deposit_amount}} FCFA</h6>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Retrait</h6>
                        <h6 class="text-bold mb-10">{{$total_amount_withdrawn}} FCFA</h6>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
        </div>
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
                    <h6 class="mb-25" >Dépôt</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select wire:model="depositOperationId">
                                        <option value="" selected disabled>Selectionner une Opération</option>
                                        @foreach($deposits as $deposit)
                                            <option value="{{$deposit->id}}">{{$deposit->libelle}}</option>
                                        @endforeach
                                        @error('depositOperationId') <span class="text-danger">{{ $message }}</span> @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end input -->
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Transaction</label>
                                <div class="select-position">
                                    <select wire:model="depositTransactionId">
                                        <option value="" selected disabled>selectionner une transaction</option>
                                        @foreach($transactions as $transaction)
                                            <option value="{{$transaction->id}}">{{$transaction->libelle}}</option>
                                        @endforeach
                                        @error('depositTransactionId') <span class="text-danger">{{ $message }}</span> @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end input -->
                    <div class="input-style-1">
                        <label>Libellé / Numéro</label>
                        <input type="text" wire:model="labelDeposit" placeholder="Libellé / Numéro"/>
                    </div>
                    <div class="input-style-1">
                        <label>Montant</label>
                        <input type="text" wire:model="amountDeposit" placeholder="saisir le montant"/>
                        @error('amountDeposit') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <h6 class="mb-25">Retrait</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="select-style-1">
                                <label>Opération</label>
                                <div class="select-position">
                                    <select wire:model="withdrawalOperationId">
                                        <option value="" selected disabled>Selectionner une Opération</option>
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
                                    <select wire:model="withdrawalTransactionId">
                                        <option value="" selected disabled>selectionner une transaction</option>
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

        <!-- Historique de transaction journalière -->
        @php
            $i = 1
        @endphp
        <div class="row">
            <h3 class="mb-5">Historique Journalière</h3>
            <div class="col-lg-12">
                <div class="tab-style-1">
                    <nav class="nav " id="nav-tab">
                        <button wire:ignore class="active" id="tab-1-1" data-bs-toggle="tab" data-bs-target="#tabContent-1-1">
                            Dépôt
                        </button>
                        <button wire:ignore id="tab-1-2" data-bs-toggle="tab" data-bs-target="#tabContent-1-2">
                            Retrait
                        </button>
                    </nav>
                    <div class="tab-content" id="nav-tabContent1">
                        <div class="tab-pane fade show active" wire:ignore.self id="tabContent-1-1">
                            <div class="card-style mb-30">
                                <h6 class="mb-10">Dépôt </h6>
                                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class="left">
                                        <p>Afficher <span>10 ères</span> Transactions</p>
                                    </div>
                                    <div class="right">
                                        <div class="table-search d-flex align-items-md-end">
                                            <form action="#">
                                                <input type="text" wire:model.debounce.500ms="searchLabelAndAmountDeposit" placeholder="libelle ou numéro" />
                                                <button><i class="lni lni-search-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="lead-info"><h6>N°</h6></th>
                                            <th class="lead-email"><h6>Opération</h6></th>
                                            <th class="lead-phone"><h6>Montant dépôt</h6></th>
                                            <th class="lead-company"><h6>Transaction</h6></th>
                                            <th class="lead-company"><h6>Libellé/numéro</h6></th>
                                            <th><h6>Actions</h6></th>
                                        </tr>
                                        <!-- end table row-->
                                        </thead>
                                        <tbody>
                                        @forelse($dailyDeposits as $deposit)
                                            <tr>
                                                <td class="text-sm" >
                                                    {{$i ++}}
                                                </td>
                                                <td>
                                                    <p>{{$deposit->operation->libelle}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$deposit->amount}} FCFA</p>
                                                </td>
                                                <td>
                                                    <p>{{$deposit->transaction->libelle}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$deposit->label}}</p>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <button wire:click="edit({{$deposit->id}})" class="text-primary">
                                                            <i class="lni lni-pencil"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if($editId === $deposit->id)
                                                <tr>
                                                    <livewire:movements.table-form
                                                    :deposits="$deposits"
                                                    :deposit="$deposit"
                                                    :transactions="$transactions"
                                                    :wire:key="'table-form-'.$deposit->id"/>
                                                </tr>
                                            @endif
                                            @empty
                                                <p>Aucune transaction pour le moment</p>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                                <div class="pt-10 d-flex flex-wrap justify-content-between">
                                    <div class="left">
                                        <p class="text-sm text-gray">   {{$dailyDeposits->total() > 10 ? 'Afficher 10 /'.$dailyDeposits->total() . 'Dépôts' : '' }}</p>
                                    </div>
                                    <div class="right table-pagination">
                                       {{$dailyDeposits->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $j = 1
                        @endphp
                        <div class="tab-pane fade" id="tabContent-1-2" wire:ignore.self >
                            <div class="card-style mb-30">
                                <h6 class="mb-10">Retrait </h6>
                                <div class=" d-flex flex-wrap justify-content-between align-items-center py-3" >
                                    <div class="left">
                                        <p>Afficher <span>10 ères</span> transactions</p>
                                    </div>
                                    <div class="right">
                                        <div class="table-search d-flex">
                                            <form action="#">
                                                <input type="text" wire:model.debounce.500ms="searchLabelAndAmountWithdrawal" placeholder="libelle ou numéro" />
                                                <button><i class="lni lni-search-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="lead-info"><h6>N°</h6></th>
                                            <th class="lead-email"><h6>Opération</h6></th>
                                            <th class="lead-phone"><h6>Montant retrait</h6></th>
                                            <th class="lead-company"><h6>Transaction</h6></th>
                                            <th class="lead-company"><h6>Libellé</h6></th>
                                            <th><h6>Action</h6></th>
                                        </tr>
                                        <!-- end table row-->
                                        </thead>
                                        <tbody>
                                        @forelse($dailyWithdrawals as $withdrawal )
                                        <tr>
                                            <td>
                                                {{$j++}}
                                            </td>
                                            <td>
                                                <p>{{$withdrawal->operation->libelle}}</p>
                                            </td>
                                            <td>
                                                <p>{{$withdrawal->amount}} FCFA</p>
                                            </td>
                                            <td>
                                                <p>{{$withdrawal->transaction->libelle}}</p>
                                            </td>
                                            <td>
                                                <p>{{$withdrawal->label}}</p>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button wire:click="edit({{$withdrawal->id}})" class="text-primary">
                                                        <i class="lni lni-pencil"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($editId === $withdrawal->id)
                                            <tr>
                                                <livewire:movements.table-form-withdrawal
                                                :withdrawals="$withdrawals"
                                                :withdrawal="$withdrawal"
                                                :transactions="$transactions"
                                                :wire:key="'table-form-'.$withdrawal->id"/>
                                            </tr>
                                        @endif
                                        @empty
                                            <p>Aucune transaction pour le moment</p>
                                            <br>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                                <div class="pt-10 d-flex flex-wrap justify-content-between">
                                    <div class="left">
                                        <p class="text-sm text-gray">
                                            {{$dailyWithdrawals->total() > 10 ? 'Afficher 10 /'.$dailyWithdrawals->total() . 'Retraits' : '' }}</p>
                                    </div>
                                    <div class="right table-pagination">
                                      {{$dailyWithdrawals->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
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
