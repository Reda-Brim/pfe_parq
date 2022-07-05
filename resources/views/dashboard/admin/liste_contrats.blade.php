@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Admin dashboard')


@section('content')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des contrats</h3>
              <div class="d-flex justify-content-end " style=" column-gap: 20px;">
                <a href="{{route('admin.Nouveau_contrat_achat')}}" class="btn btn-primary"><STROng>+ </STROng> Contrat Achat</a>

                <a href="{{route('admin.Nouveau_contrat_location')}}" class="btn btn-primary"><STROng>+ </STROng> Contrat Location</a>
                <a href="{{route('admin.impression_contrats')}} " class="btn btn-warning">Imprimer liste des contrats </a>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
  

                <form action="">
                  <div class="d-flex justify-content-end mb-4">
                   <input type="search" name="search" class="form-control" placeholder="chercher par nom ou prénom, cin, email, téléphone" value="{{$search}}">
                   <button class="btn btn-primary">Chercher</button>
                  </div>
                </form>
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info" >
                <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">N°contrat</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Cin Client</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Nom Client</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Prénom Client</th>
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
                    @if($contrat->typeContrat=='location')
                    <a href="detail_contrat_location/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-eye" style="width: 20%"></a>
                  
                  @elseif($contrat->typeContrat=='Vente')
                    <a href="detail_contrat_achat/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-eye" style="width: 20%"></a>
                  
                   @endif

                   @if($contrat->typeContrat=='Vente')
                    <a href="modifier_contrat_achat/{{$contrat->id}}" class="fas fa-edit" style="width: 20%"></a>
                    @elseif($contrat->typeContrat=='location')
                    <a href="modifier_contrat_location/{{$contrat->id}}" class="fas fa-edit" style="width: 20%"></a>
                    @endif

               
                    <a href="supprimer_contrat/{{$contrat->id}}" class="fa fa-trash " style="width: 20%"></a>
                    @if($contrat->typeContrat=='Vente')
                    <a href="impression_detail_contrat_achat/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-print" style="width: 20%"></a>
                    @elseif($contrat->typeContrat=='location')
                    <a href="impression_detail_contrat_location/{{$contrat->numeroContrat}}/{{$contrat->cinClient}}/{{$contrat->matriculeVehicules}}" class="fa fa-print" style="width: 20%"></a>
                    @endif
                    

                   
                    {{-- <a href="#" class="btn btn-info"style="width: 100px">Modifier</a>
                    <a href="#" class="btn btn-danger"style="width: 100px">Supprimer</a> --}}
                    {{-- <a href="modifier_vehicule/{{$contrat->id}}" class="btn btn-info" style="width: 100px">Modifier</a>
                    <a href="supprimer_vehicule/{{$contrat->id}}" class="btn btn-danger"style="width: 100px">Supprimer</a> --}}
                  </td>
                  {{-- <td>
                    
                    
  
                    
                
                               
                           $endDate=\Carbon\Carbon::parse($contrat->dateFinLocationVehicules);
                       
                          $now = \Carbon\Carbon::now();
                          $printedDate = $endDate->diffInDays($now);

                        
                  
                     {{$printedDate}} 
                    </td> --}}
                </tr>
                    
                @endforeach
                  
                
                </tbody>
  
              </table>
            {{-- </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
  
          {{-- <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Browser</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">CSS grade</th></tr>
                </thead>
                <tbody>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <tr class="odd">
                  <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                  <td style="">Firefox 1.0</td>
                  <td style="">Win 98+ / OSX.2+</td>
                  <td style="">1.7</td>
                  <td style="">A</td>
                </tr><tr class="even">
                  <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                  <td style="">Firefox 1.5</td>
                  <td style="">Win 98+ / OSX.2+</td>
                  <td style="">1.8</td>
                  <td style="">A</td>
                </tr><tr class="odd">
                  <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                  <td style="">Firefox 2.0</td>
                  <td style="">Win 98+ / OSX.2+</td>
                  <td style="">1.8</td>
                  <td style="">A</td>
                </tr><tr class="even">
                  <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                  <td style="">Firefox 3.0</td>
                  <td style="">Win 2k+ / OSX.3+</td>
                  <td style="">1.9</td>
                  <td style="">A</td>
                </tr><tr class="odd">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Camino 1.0</td>
                  <td style="">OSX.2+</td>
                  <td style="">1.8</td>
                  <td style="">A</td>
                </tr><tr class="even">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Camino 1.5</td>
                  <td style="">OSX.3+</td>
                  <td style="">1.8</td>
                  <td style="">A</td>
                </tr><tr class="odd">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Netscape 7.2</td>
                  <td style="">Win 95+ / Mac OS 8.6-9.2</td>
                  <td style="">1.7</td>
                  <td style="">A</td>
                </tr><tr class="even">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Netscape Browser 8</td>
                  <td style="">Win 98SE+</td>
                  <td style="">1.7</td>
                  <td style="">A</td>
                </tr><tr class="odd">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Netscape Navigator 9</td>
                  <td style="">Win 98+ / OSX.2+</td>
                  <td style="">1.8</td>
                  <td style="">A</td>
                </tr><tr class="even">
                  <td class="sorting_1 dtr-control">Gecko</td>
                  <td style="">Mozilla 1.0</td>
                  <td style="">Win 95+ / OSX.1+</td>
                  <td style="">1</td>
                  <td style="">A</td>
                </tr></tbody>
                <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1" style="">Browser</th><th rowspan="1" colspan="1" style="">Platform(s)</th><th rowspan="1" colspan="1" style="">Engine version</th><th rowspan="1" colspan="1" style="">CSS grade</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.card-body -->
          </div> --}}
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>



@endsection