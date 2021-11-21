@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
                <i class="lni lni-cart-full"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total Dépôt</h6>
                <h3 class="text-bold mb-10">34567</h3>
                <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i> +2.00%
                    <span class="text-gray">(aujourd'huit)</span>
                </p>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="lni lni-dollar"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total Retrait</h6>
                <h3 class="text-bold mb-10">$74,567</h3>
                <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i> +5.45%
                    <span class="text-gray">(aujourd'huit)</span>
                </p>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-credit-cards"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total dépôt</h6>
                <h3 class="text-bold mb-10">$24,567</h3>
                <p class="text-sm text-danger">
                    <i class="lni lni-arrow-down"></i> -2.00%
                    <span class="text-gray">Mois</span>
                </p>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon orange">
                <i class="lni lni-user"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total Retrait</h6>
                <h3 class="text-bold mb-10">34567</h3>
                <p class="text-sm text-danger">
                    <i class="lni lni-arrow-down"></i> -25.00%
                    <span class="text-gray">Mois</span>
                </p>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->
<div class="row">
    <div class="col-lg-2">
        <div class="select-style-1">
            <label>Employé</label>
            <div class="select-position">
                <select>
                    <option value="" selected>Carole</option>
                    <option value="">Tony</option>
                    <option value="">GOBE</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="select-style-1">
            <label>Opération</label>
            <div class="select-position">
                <select>
                    <option value="" selected>Dépot Client</option>
                    <option value="">Retrait Client</option>
                    <option value="">Approv Caisse</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="select-style-1">
            <label>Transactions</label>
            <div class="select-position">
                <select>
                    <option value="" selected>Mobile Money</option>
                    <option value="">Orange Money</option>
                    <option value="">YUP</option>
                    <option value="">RIA</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="input-style-1">
            <label>Périodicité du :</label>
            <input type="date" />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="input-style-1">
            <label>Au:</label>
            <input type="date" />
        </div>
    </div>
    <div class="col-lg-2 mb-2 justify-content-end">
        <button class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Filtrer</button>
    </div>
    <div class="col-lg-2 mb-2 justify-content-end">
        <button class="main-btn dark-btn-outline rounded-md btn-hover" type="submit">Rénitialiser le filtre</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10">Journal de caisse</h6>
            <div class="table-wrapper table-responsive">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <h6>Opération</h6>
                            </th>
                            <th>
                                <h6>Dépôt</h6>
                            </th>
                            <th>
                                <h6>Retrait</h6>
                            </th>
                            <th>
                                <h6>Transaction</h6>
                            </th>
                            <th>
                                <h6>Date</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h6 class="text-sm">#1</h6>
                            </td>
                            <td>
                                <p>Dépôt </p>
                            </td>
                            <td>
                                <p>Miles</p>
                            </td>
                            <td>
                                <p>@albert_miles</p>
                            </td>
                            <td>
                                <p>@albert_miles</p>
                            </td>
                            <td>
                                <p>@albert_miles</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                            <td>
                                <h6 class="text-sm">#2</h6>
                            </td>
                            <td>
                                <p>Retrait</p>
                            </td>
                            <td>
                                <p>Doe</p>
                            </td>
                            <td>
                                <p>@john_doe</p>
                            </td>
                            <td>
                                <p>Doe</p>
                            </td>
                            <td>
                                <p>@john_doe</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                            <td>
                                <h6 class="text-sm">#3</h6>
                            </td>
                            <td>
                                <p>retrait</p>
                            </td>
                            <td>
                                <p>Smith</p>
                            </td>
                            <td>
                                <p>@davidsmith</p>
                            </td>
                            <td>
                                <p>Smith</p>
                            </td>
                            <td>
                                <p>@davidsmith</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                            <td>
                                <h6 class="text-sm">#4</h6>
                            </td>
                            <td>
                                <p>Autre retrait</p>
                            </td>
                            <td>
                                <p>Kareem</p>
                            </td>
                            <td>
                                <p>@jkreem</p>
                            </td>
                            <td>
                                <p>Kareem</p>
                            </td>
                            <td>
                                <p>@jkreem</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                            <td>
                                <h6 class="text-sm">#5</h6>
                            </td>
                            <td>
                                <p>Appro Caisse</p>
                            </td>
                            <td>
                                <p>Miles</p>
                            </td>
                            <td>
                                <p>@anna_miles</p>
                            </td>
                            <td>
                                <p>Miles</p>
                            </td>
                            <td>
                                <p>@anna_miles</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                            <td>
                                <h6 class="text-sm">#6</h6>
                            </td>
                            <td>
                                <p>Autre dépôt</p>
                            </td>
                            <td>
                                <p>Miles</p>
                            </td>
                            <td>
                                <p>@hafiz_miles</p>
                            </td>
                            <td>
                                <p>Miles</p>
                            </td>
                            <td>
                                <p>@hafiz_miles</p>
                            </td>
                        </tr>
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
@stop