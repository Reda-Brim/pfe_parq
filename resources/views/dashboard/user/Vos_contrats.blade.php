@extends('dashboard.user.layouts.User-dash-layout')
@section('title','User dashboard')


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des contrats</h3>
              <div class="d-flex justify-content-end " style=" column-gap: 20px;">
   
                {{-- <a href="#" class="btn btn-warning">Imprimer liste des vehicules </a> --}}

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
  


                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info" >
                <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">N°contrat</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Cin Client</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Nom Client</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Prenom Client</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Matricule voiture</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Marque voiture</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Modele voiture</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">type contrat</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">type paiement</th>

                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th>
                  {{-- <th>Jour reste</th> --}}
              
                </tr>
                </thead>
                <tbody>

                @foreach ($contrats as $contrat)
                <tr>
                    <input type="hidden" name="matriculeVehicules" value="{{$contrat->matriculeVehicules}}">
                 
                  <td>{{$contrat->numeroContrat}}</td>
                  <td>{{$contrat->cinClient}}</td>
                  <td>{{$contrat->nom}}</td>
                  <td>{{$contrat->prenom}}</td>
                  <td>{{$contrat->matriculeVehicules}}</td>
                  <td>{{$contrat->Marque}}</td>
                  <td>{{$contrat->Modele}}</td>

                  <td>{{$contrat->typeContrat}}</td>
                  <td>{{$contrat->typePaiement}}</td>

                

                  <td>



                    @if($contrat->typeContrat=='Vente')
                    <a href="impression_detail_contrat_achat/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-print" ></a>
                    @elseif($contrat->typeContrat=='location')
                    <a href="impression_detail_contrat_location/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-print" ></a>
                    @endif
 
                  </td>

                </tr>
                    
                @endforeach
                  
                
                </tbody>
  
              </table>
            {{-- </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  @endsection
