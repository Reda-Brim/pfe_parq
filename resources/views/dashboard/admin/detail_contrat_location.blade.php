{{-- <table style="width: 100%">
 <tr>
   
  <td>{{$Info->numeroContrat}}</td>
  <td>{{$Info->typeContrat}}</td>
</tr>
<tr>
  <td>{{$Info->cinClient}}</td>
  <td>{{$Info->nom}}</td>
  <td>{{$Info->prenom}}</td>
  <td>{{$Info->numeroPermis}}</td>
  <td>{{$Info->adressClient}}</td>
  <td>{{$Info->telephone}}</td>
  <td>{{$Info->email}}</td>
  <td>{{$Info->ville}}</td>
  <td>{{$Info->codePotal}}</td>

</tr>
<tr>

  <td>{{$Info->Marque}}</td>
  <td>{{$Info->Modele}}</td>
  <td>{{$Info->AnneeModele}}</td>
  <td>{{$Info->Puissance}}</td>
  <td>{{$Info->matriculeVehicules}}</td>
  <td>{{$Info->Carburant}}</td>
  <td>{{$Info->dateDebutAssurance}}</td>  
  <td>{{$Info->dateFinAssurance}}</td>
  <td>{{$Info->dateDebutCertificatVisiteTechnique}}</td>
  <td>{{$Info->dateFinCertificatVisiteTechnique}}</td>
  
</tr>
<tr>
 
  <td>{{$Info->dureeLocationVehicules}}</td>
  <td>{{$Info->dateDebutLocationVehicules}}</td>
  <td>{{$Info->dateFinLocationVehicules}}</td>
  <td>{{$Info->coutParJourVehicules}}</td>
  <td>{{$Info->typePaiement}}</td>

  </tr>
</table> --}}

@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Admin dashboard')


@section('content')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
              <h3 class="card-title">Information du contrat</h3> <a href="{{route('admin.liste_contrats')}}" class="btn btn-danger float-right">Retour</a>
              
              <div class="d-flex justify-content-end mb-4" style=" column-gap: 20px;">

                {{-- <a href="#" class="btn btn-primary">Imprimer </a> --}}
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
  
                <H2  class="d-flex justify-content-center mb-4 font-weight-bold">Contrat location Vehicule </H2>
                <table  class="table"  >
               
                  <tr>
                    <th  class=" "  style="width: 190px;">N°contrat :</th>
                    <td style="">{{$Info->numeroContrat}}</td>
                    </tr>
 
              <tr style="border: 1px solid #ccc;" >
                <th class="sorting text-danger"   style="border: 1px solid #ccc; "tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Infos Client :</th>
                {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Info Vendeur</th> --}}
              
               <tr>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Cin Client :</th>
              <td>{{$Info->cinClient}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Nom :</th>

              <td>{{$Info->nom}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Prenom :</th>

              <td>{{$Info->prenom}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Numero Permis :</th>

              <td>{{$Info->numeroPermis}}</td>
              </tr>
              <tr>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Adress Client :</th>

              <td>{{$Info->adressClient}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Telephone :</th>

              <td>{{$Info->telephone}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">E-mail :</th>

              <td>{{$Info->email}}</td>
            </tr>
              <tr>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Ville :</th>

              <td>{{$Info->ville}}</td>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Code Potal :</th>

              <td>{{$Info->codePotal}}</td>
            </tr>

          </tr>   

          <tr style="border: 1px solid #ccc; text-color:red;" >
            <th class="sorting text-danger"  style="border: 1px solid #ccc;" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Infos Vendeur :</th>
            {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Info Vendeur</th> --}}
          
           <tr>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Cin Vendeur :</th>
          <td>WA303325</td>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Nom :</th>

          <td>Brim</td>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Prenom :</th>

          <td>Reda</td>

          </tr>
          <tr>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Adress Client :</th>

          <td>27 rue mohamed ibrahim hay el wahda </td>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Telephone :</th>

          <td>0767729701</td>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">E-mail :</th>

          <td>Redabrim2002@gmail.com</td>
        </tr>
          <tr>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Ville :</th>

          <td>Berrechid</td>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Code Postal :</th>

          <td>26100</td>
        </tr>

      </tr>   

      <tr style="border: 1px solid #ccc;" >
        <th class="sorting text-danger"   style="border: 1px solid #ccc; "tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Infos Vehicule :</th>
        {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Info Vendeur</th> --}}

       <tr>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Marque :</th>
      <td>{{$Info->Marque}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Matricule  :</th>

      <td>{{$Info->matriculeVehicules}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Modele :</th>

      <td>{{$Info->Modele}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Annee Modele :</th>

      <td>{{$Info->AnneeModele}}</td>
      
      </tr>
      <tr>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Puissance :</th>

      <td>{{$Info->Puissance}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Carburant :</th>

      <td>{{$Info->Carburant}}</td>

    </tr>
      <tr>
        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Debut Assurance :</th>

      <td>{{$Info->dateDebutAssurance}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Fin Assurance :</th>

      <td>{{$Info->dateFinAssurance}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Debut Certificat Visite Technique :</th>

      <td>{{$Info->dateDebutCertificatVisiteTechnique}}</td>
      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Fin Certificat Visite Technique :</th>

      <td>{{$Info->dateFinCertificatVisiteTechnique}}</td>
    </tr>

  </tr>
  <tr style="border: 1px solid #ccc;" >
    <th class="sorting text-danger"   style="border: 1px solid #ccc;" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Duree du location:</th>
    {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Info Vendeur</th> --}}

   <tr>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Duree Location Vehicules :</th>
  <td>{{$Info->dureeLocationVehicules}} Jours</td>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Debut Location Vehicules  :</th>

  <td>{{$Info->dateDebutLocationVehicules}} </td>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Date Fin Location Vehicules :</th>

  <td>{{$Info->dateFinLocationVehicules}} </td>


  
  </tr>




</tr>
<tr style="border: 1px solid #ccc;" >
  <th class="sorting text-danger"   style="border: 1px solid #ccc;" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Infos du Paiement :</th>
  {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Info Vendeur</th> --}}

 <tr>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">cout Par Jour Vehicule :</th>
<td>{{$Info->coutParJourVehicules}} DH</td>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Type Paiement  :</th>

<td>{{$Info->typePaiement}} </td>




</tr>




</tr>


      

   
         
            
  
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