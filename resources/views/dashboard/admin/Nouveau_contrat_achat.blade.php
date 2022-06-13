
@extends('dashboard.admin.layouts.admin-dash-layout')


@section('title','Admin dashboard')




@section('content')

<div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
    <div class="card-header ">
        <h4 ><strong>Contrat achat</strong> <a href="{{route('admin.liste_contrats')}}" class="btn btn-danger float-right">Retour</a></h4>
        
      </div>
    <div class="card-body p-5 shadow-5 text-center" >
     
    
        
        <form action="{{route('admin.create_contrat_achat')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" name="numeroContrat" class="form-control" placeholder="numeroContrat" value="{{old ('numeroContrat')}}" >
                    <label class="form-label" for="numeroContrat">Numero Contrat</label>
                    <span class="text-danger">@error('numeroContrat'){{$message}}@enderror</span>
                    </div>
                </div>
    
            <div class="col-md-6 mb-4">
                <div class="form-outline">
        
                    <select name="typeContrat" class="form-control">
                      <option>--</option>
                      <option value="Vente">Vente</option>
        
                  
                    </select>
                    <label class="form-label" for="typeContrat">Type Contrat</label>
                    <span class="text-danger">@error('typeContrat'){{$message}}@enderror</span>
                  </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" name="cinClient" class="form-control" placeholder="cinClient" value="{{old ('cinClient')}}" >
                    <label class="form-label" for="cinClient">Cin Client</label>
                    <span class="text-danger">@error('cinClient'){{$message}}@enderror</span>
                    </div>
                </div>
    
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" name="matriculeVehicules" class="form-control" placeholder="matriculeVehicules" value="{{old ('matriculeVehicules')}}" >
                    <label class="form-label" for="matriculeVehicules">Matricule Vehicules</label>
                    <span class="text-danger">@error('matriculeVehicules'){{$message}}@enderror</span>
                    </div>
            </div>
          </div>  
          
          <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="number" name="prixAchatVehicules" class="form-control" placeholder="prixAchatVehicules" value="{{old ('prixAchatVehicules')}}" >
                    <label class="form-label" for="prixAchatVehicules">prix Achat Vehicules</label>
                    <span class="text-danger">@error('prixAchatVehicules'){{$message}}@enderror</span>
                    </div>
                </div>
    
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="date" name="dateAchatVehicules" class="form-control" placeholder="dateAchatVehicules" value="{{old ('dateAchatVehicules')}}" >
                    <label class="form-label" for="dateAchatVehicules">date Achat Vehicules</label>
                    <span class="text-danger">@error('dateAchatVehicules'){{$message}}@enderror</span>
                    </div>
            </div>
          </div>

          <div class="form-outline mb-4">  
            <select name="typePaiement" class="form-control">
                <option>--</option>
              <option value="cheque">cheque</option>
              <option value="carteBancaire">carte Bancaire</option>
              <option value="especes">especes</option>
          
            </select>
            <label class="form-label" for="typePaiement">Type Paiement</label>
            <span class="text-danger">@error('typePaiement'){{$message}}@enderror</span>
      </div>
          <!-- Submit button -->
          <div class="form-group mb-3 ">
           
            <button type="submit" class="btn btn-primary float-left">Valider contrat </button>
    
        </div>
    
    
    
        </form>
      </div>
    
    </div>



@endsection