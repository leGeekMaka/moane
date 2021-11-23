<div>
    <div class="row">
        <div class="col-lg-12">
            <button class="main-btn primary-btn btn-hover mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="lni lni-plus me-2"></i> Ajouter
            </button>
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
                                    <h6 class="text-sm">{{ $operation->id }}</h6>
                                </td>
                                <td>
                                    <p> {{ $operation->libelle }} </p>
                                </td>
                                <td>
                                    <p>{{$operation->created_at}}</p>
                                </td>
                                <td>
                                    <div class="action">
                                        <button class=" edit">
                                            <i class="lni lni-pencil"></i>
                                        </button>
                                        <button class="text-danger">
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


            <!-- formulaire de saisi des données -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">


                    @csrf
                    <div class="input-style-1">
                        <label>Libellé</label>
                        <input type="text" id="libelle" name="libelle" placeholder="Libellé " />
                    </div>
                    <div class="text-center">
                        <button id="addTransaction" class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Enregistrer
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>