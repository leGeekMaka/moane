<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="row">
        <div class="col-lg-6">
            @if(session()->has('message'))
                <div id="alert-message"   class="alert alert-success alert-dismissible fade show" role="alert">
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
        </div>
        <div class="col-lg-12">
            <button wire:ignore type="button" class="main-btn btn-sm primary-btn btn-hover mb-2"
                    data-bs-toggle="modal" data-bs-target="#ModalTwo"><i class="lni lni-plus me-2"></i> Ajouter
            </button>

            @php
            $i = 1
            @endphp
            <div class="card-style mb-30">
                <h6 class="mb-10">Type d'opération</h6>
                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>
                                    <h6>Libellé</h6>
                                </th>
                                <th>
                                    <h6>Date</h6>
                                </th>
                                <th>
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody class="tab_body">
                            @foreach ($operations as $operation )
                            <tr>
                                <td>
                                    <h6 class="text-sm">{{ $i++ }}</h6>
                                </td>
                                <td>
                                    <p> {{ $operation->libelle }} </p>
                                </td>
                                <td>
                                    <p>{{$operation->created_at}}</p>
                                </td>
                                <td>
                                    <div class="action">
                                        <button class="edit" data-bs-toggle="modal" data-bs-target="#ModalTwo"
                                                wire:click="edit({{$operation->id}})" >
                                            <i class="lni lni-pencil"></i>
                                        </button>
                                        <button class="text-danger" data-bs-toggle="modal" data-bs-target="#ModalTree"
                                                wire:click="getId({{$operation->id}})" >
                                            <i class="lni lni-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->

            <!-- modal store -->
            <div class="warning-modal">
                <div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="ModalTwo" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content card-style warning-card">
                            <div class="modal-body">
                                <div class="input-style-1">
                                    <label>Libellé</label>
                                    <input type="text" wire:model="libelle" placeholder="" />
                                    @error('libelle') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="select-style-1">
                                            <label>Type d'opération</label>
                                            <div class="select-position">
                                                <select wire:model="operationType">
                                                    <option value="" disabled selected >Selectionner une Opération</option>
                                                        <option value="1">Dépôt</option>
                                                        <option value="2">Retrait</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    @if($edit === "true")
                                        <button class="main-btn danger-btn-outline rounded-md btn-hover" data-bs-dismiss="modal"
                                                wire:click="cancel">Annuler
                                        </button>
                                        <button class="main-btn active-btn-outline rounded-md btn-hover"
                                                wire:click="update">Modifier
                                        </button>
                                    @else
                                        <button class="main-btn danger-btn-outline rounded-md btn-hover" data-bs-dismiss="modal"
                                                wire:click="cancel">Annuler
                                        </button>
                                        <button class="main-btn active-btn-outline rounded-md btn-hover"
                                                wire:click="store">Enregistrer
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal de suppression--}}

            <div class="warning-modal">
                <div  wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="ModalTree" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content card-style warning-card text-center">
                            <div class="modal-header px-0 border-0 d-flex justify-content-end ">
                                <button class="border-0 bg-transparent h1" wire:click="cancel" data-bs-dismiss="modal">
                                    <i class="lni lni-cross-circle"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="icon text-danger mb-20">
                                    <i class="lni lni-warning"></i>
                                </div>
                                <div class="content mb-30">
                                    <h2 class="mb-15">Attention !</h2>
                                    <p class="text-sm text-medium">
                                        Vous allez supprimer : <strong> {{ $libelle }}</strong>
                                    </p>
                                </div>
                                <div class="action d-flex flex-wrap justify-content-center">
                                    <button data-bs-dismiss="modal" wire:click="$emit('destroy')" class="main-btn danger-btn rounded-full btn-hover m-1"
                                    > Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('closeModal', () => {
            let myModalEl = document.getElementById('ModalTwo');
            let modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide()
        });

        Livewire.on('closeModalDestroy', () =>{
            let myModalEl = document.getElementById('ModalTree');
            let modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide()
        });

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
