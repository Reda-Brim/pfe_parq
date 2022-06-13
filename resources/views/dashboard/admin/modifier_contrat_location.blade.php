
@extends('dashboard.admin.layouts.admin-dash-layout')


@section('title','Admin dashboard')




@section('content')
<div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
  <div class="card-header ">
      <h4 ><strong>Modifier Contrat location</strong> <a href="{{route('admin.liste_contrats')}}" class="btn btn-danger float-right">Retour</a></h4>
      
    </div>
  <div class="card-body p-5 shadow-5 text-center" >
   
  
      
      <form action="{{route('admin.editer_contrat_location')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @if(Session::get('succes'))
        <div class="alert alert-success">
          {{Session::get('succes')}}
        </div>
        @endif
        @if(Session::get('echec'))
        <div class="alert alert-danger">
          {{Session::get('echec')}}
        </div>
        @endif
  
        @csrf
        <input type="hidden" name="cid" value="{{$Info->id}}">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="cinClient" class="form-control" placeholder="cinClient" value="{{$Info->cinClient}}" >
                <label class="form-label" for="cinClient">Cin Client</label>
                <span class="text-danger">@error('cinClient'){{$message}}@enderror</span>
                  </div>
              </div>
  
          <div class="col-md-6 mb-4">
              <div class="form-outline">
      
                  <select name="typeContrat" class="form-control">
                      <option value="location">--</option>
                    <option value="location">location</option>
                
                  </select>
                  <label class="form-label" for="typeContrat">Type Contrat</label>
                  <span class="text-danger">@error('typeContrat'){{$message}}@enderror</span>
                </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="matriculeVehicules" class="form-control" placeholder="matriculeVehicules" value="{{$Info->matriculeVehicules}}" >
                <label class="form-label" for="matriculeVehicules">Matricule Vehicules</label>
                <span class="text-danger">@error('matriculeVehicules'){{$message}}@enderror</span>
   
                  </div>
              </div>
  
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="number" name="dureeLocationVehicules" class="form-control" placeholder="dureeLocationVehicules" value="{{$Info->dureeLocationVehicules}}" >
                <label class="form-label" for="dureeLocationVehicules">duree Location Vehicules</label>
                <span class="text-danger">@error('dureeLocationVehicules'){{$message}}@enderror</span>
                  </div>
          </div>
        </div>  

        <div class="row">
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                  <input type="date" name="dateDebutLocationVehicules" class="form-control" placeholder="dateDebutLocationVehicules" value="{{$Info->dateDebutLocationVehicules}}" >
                  <label class="form-label" for="dateDebutLocationVehicules">date Debut Location Vehicules</label>
                  <span class="text-danger">@error('dateDebutLocationVehicules'){{$message}}@enderror</span>
                  </div>
              </div>
  
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                  <input type="date" name="dateFinLocationVehicules" class="form-control" placeholder="dateFinLocationVehicules" value="{{$Info->dateFinLocationVehicules}}" >
                  <label class="form-label" for="dateFinLocationVehicules">date Fin Location Vehicules</label>
                  <span class="text-danger">@error('dateFinLocationVehicules'){{$message}}@enderror</span>
                  </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                <select name="typePaiement" class="form-control">
                    <option value="{{$Info->typePaiement}}">--</option>
                  <option value="cheque">cheque</option>
                  <option value="carteBancaire">carte Bancaire</option>
                  <option value="especes">especes</option>
              
                </select>
                <label class="form-label" for="typePaiement">Type Paiement</label>
                <span class="text-danger">@error('typePaiement'){{$message}}@enderror</span>
                  </div>
              </div>
  
          <div class="col-md-6 mb-4">
              <div class="form-outline">
                  <input type="number" name="coutParJourVehicules" class="form-control" placeholder="coutParJourVehicules" value="{{$Info->coutParJourVehicules}}" >
                  <label class="form-label" for="coutParJourVehicules">cout Par Jour Vehicules</label>
                  <span class="text-danger">@error('coutParJourVehicules'){{$message}}@enderror</span>
                  </div>
          </div>
        </div>
 
        <!-- Submit button -->
        <div class="form-group mb-3 ">
         
          <button type="submit" class="btn btn-primary float-left">Valider modifications </button>
  
      </div>
  
  
  
      </form>
    </div>
  
  </div>


@endsection