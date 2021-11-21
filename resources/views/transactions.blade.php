@extends('layouts.app')


@section('content')
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
                <select>
                  <option value="">Appro Caisse</option>
                  <option selected value="">Dépôt Client</option>
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
          <input type="text" placeholder="Libellé / Numéro" />
        </div>
        <div class="input-style-1">
          <label>Montant</label>
          <input type="text" placeholder="Montant" />
        </div>
        <div class="text-center"> <button class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Enregistrer</button> </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
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
          <input type="text" placeholder="Libellé / Numéro" />
        </div>
        <div class="input-style-1">
          <label>Montant</label>
          <input type="text" placeholder="Montant" />
        </div>
        <div class="text-center"> <button class="main-btn active-btn-outline rounded-md btn-hover" type="submit">Enregistrer</button> </div>
      </div>
    </div>
  </div>

  <!-- end row -->
</div>
@stop