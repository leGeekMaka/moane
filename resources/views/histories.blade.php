@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="tab-style-1 m-4">
            <nav class="nav " id="nav-tab">
                <button class="active" id="tab-1-1" data-bs-toggle="tab" data-bs-target="#tabContent-1-1">
                    Dépôt
                </button>
                <button id="tab-1-2" data-bs-toggle="tab" data-bs-target="#tabContent-1-2">
                    Retrait
                </button>
                <!-- <button
                  id="tab-1-3"
                  data-bs-toggle="tab"
                  data-bs-target="#tabContent-1-3"
                >
                  Contact
                </button> -->
            </nav>
            <div class="tab-content" id="nav-tabContent1">
                <div class="tab-pane fade show active" id="tabContent-1-1">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Total dépôt <span class="badge bg-primary">500 000 FCFA</span> </h6>
                        <div class="
                          d-flex
                          flex-wrap
                          justify-content-between
                          align-items-center
                          py-3
                        ">
                            <div class="left">
                                <p>Afficher <span>10</span> Transactions</p>
                            </div>
                            <div class="right">
                                <div class="table-search d-flex">
                                    <form action="#">
                                        <input type="text" placeholder="Search..." />
                                        <button><i class="lni lni-search-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="lead-info">
                                            <h6>N°</h6>
                                        </th>
                                        <th class="lead-email">
                                            <h6>Opération</h6>
                                        </th>
                                        <th class="lead-phone">
                                            <h6>Montant dépôt</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Transaction</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Libellé/numéro</h6>
                                        </th>
                                        <th>
                                            <h6>Actions</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <p>depôt client</p>
                                        </td>
                                        <td>
                                            <p>200 000 FCFA</p>
                                        </td>
                                        <td>
                                            <p>Orange Money</p>
                                        </td>
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="text-danger">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            <p>Autre dépôt</p>
                                        </td>
                                        <td>
                                            <p>100 000 FCFA</p>
                                        </td>
                                        <td>
                                            <p>MTN Money</p>
                                        </td>
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="text-danger">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- end table row -->
                                    <!-- end table row -->
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <div class="pt-10 d-flex flex-wrap justify-content-between">
                            <div class="left">
                                <p class="text-sm text-gray">Showing 12/30 products</p>
                            </div>
                            <div class="right table-pagination">
                                <ul class="d-flex justify-content-end align-items-center">
                                    <li class="ms-2">
                                        <a href="#0">
                                            <i class="lni lni-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 1 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0" class="active"> 2 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 3 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 4 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0">
                                            <i class="lni lni-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabContent-1-2">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Total retrait <span class="badge bg-primary">120 000 FCFA</span> </h6>
                        <div class="
                        d-flex
                        flex-wrap
                        justify-content-between
                        align-items-center
                        py-3
                      ">
                            <div class="left">
                                <p>Afficher <span>10</span> transactions</p>
                            </div>
                            <div class="right">
                                <div class="table-search d-flex">
                                    <form action="#">
                                        <input type="text" placeholder="Search..." />
                                        <button><i class="lni lni-search-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="lead-info">
                                            <h6>N°</h6>
                                        </th>
                                        <th class="lead-email">
                                            <h6>Opération</h6>
                                        </th>
                                        <th class="lead-phone">
                                            <h6>Montant retrait</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Transaction</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Libellé</h6>
                                        </th>
                                        <th>
                                            <h6>Action</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <p>retrait client</p>
                                        </td>
                                        <td>
                                            <p>100 000 FCFA</p>
                                        </td>
                                        <td>
                                            <p>Orange Money</p>
                                        </td>
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="text-danger">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            <p>Autre retrait</p>
                                        </td>
                                        <td>
                                            <p>20 000 FCFA</p>
                                        </td>
                                        <td>
                                            <p>MTN Money</p>
                                        </td>
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <div class="action">
                                                <button class="text-danger">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- end table row -->
                                    <!-- end table row -->
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <div class="pt-10 d-flex flex-wrap justify-content-between">
                            <div class="left">
                                <p class="text-sm text-gray">Showing 12/30 products</p>
                            </div>
                            <div class="right table-pagination">
                                <ul class="d-flex justify-content-end align-items-center">
                                    <li class="ms-2">
                                        <a href="#0">
                                            <i class="lni lni-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 1 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0" class="active"> 2 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 3 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0"> 4 </a>
                                    </li>
                                    <li class="ms-2">
                                        <a href="#0">
                                            <i class="lni lni-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabContent-1-3">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and
                        more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.Lorem
                        Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since 1912.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@stop