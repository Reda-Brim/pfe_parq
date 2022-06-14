
@extends('dashboard.admin.layouts.admin-dash-layout')


@section('title','Admin dashboard')




@section('content')
<div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
  <div class="card-header ">
      <h4 ><strong>Contrat Achat</strong> </h4>
      
    </div>
  <div class="card-body p-5 shadow-5 text-center" >
   
  
      
      <form action="{{route('admin.accepter_demande_achat')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
        <input type="hidden" name="cinClient" value="{{$Info->cinClient_demande}}">
        <input type="hidden" name="matricule" value="{{$Info->matriculeVehicules_demande}}">
        <input type="hidden" name="dateAchat" value="{{$Info->dateAchat_demande}}">



     

        <!-- 2 column grid layout with text inputs for the first and last names -->
        
    
              <div class="form-outline">
                  <input type="text" name="numeroContrat" class="form-control" placeholder="numeroContrat" value="{{old ('numeroContrat')}}" >
                  <label class="form-label" for="numeroContrat">Numero Contrat</label>
                  <span class="text-danger">@error('numeroContrat'){{$message}}@enderror</span>
            </div>
            

      
            <div class="form-outline">
                <input type="number" name="prixAchatVehicules" class="form-control" placeholder="prixAchatVehicules" value="{{old ('prixAchatVehicules')}}" >
                <label class="form-label" for="prixAchatVehicules">prix Achat Vehicules</label>
                <span class="text-danger">@error('prixAchatVehicules'){{$message}}@enderror</span>
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