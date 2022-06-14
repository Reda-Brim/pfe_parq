@extends('dashboard.user.layouts.User-dash-layout')
@section('title','User dashboard')


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des vehicules</h3>
              <div class="d-flex justify-content-end ">
                {{-- <a href="{{Route('user.vehicules_disponible')}}" class="btn btn-danger">retour</a> --}}
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
  
                
                <form action="">
                  <div class="d-flex justify-content-end mb-4">
                   <input type="search" name="search" class="form-control" placeholder="chercher par matricule ou marque, Modele, carburant, Année du Modele, puissance" >
                   {{-- value="{{$search}}" --}}
                   <button class="btn btn-primary">Chercher</button>
                  </div>
                </form>
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info" >
                <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Matricule</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Marque</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Modele</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Annee du Modele</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Puissance</th>

                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Carburant</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Voiture Image</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th>
              
                </tr>
                </thead>
                <tbody>
                @foreach ($vehicules as $vehicule)
                <tr>
                 
                  <td>{{$vehicule->matricule}}</td>
                  <td>{{$vehicule->Marque}}</td>
                  <td>{{$vehicule->Modele}}</td>
                  <td>{{$vehicule->AnneeModele}}</td>
                  <td>{{$vehicule->Puissance}}</td> 
                  <td>{{$vehicule->Carburant}}</td>

                  <td>
                    <img src=" {{ asset('/uploads/vehicules/'.$vehicule->voitureImage)}}"  width="70px" height="70px" alt="Image">
           
                 
                  </td>
                  <td >
                    <a href="page_demande_location/{{$vehicule->id}}" ><IMG src="{{asset('/uploads/LOUER.png')}}" style="width:80PX;  "></IMG></a>
                    <a href="page_demande_achat/{{$vehicule->id}}"  ><IMG src="{{asset('/uploads/ACHETER.png')}}" style="width:80PX;"></IMG></a>    
                    <a href="detail_vehicules_disponible/{{$vehicule->id}}" ><IMG src="{{asset('/uploads/DETAIL.png')}}" style="width:78PX;"></IMG></a>   

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

          </div> 
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection