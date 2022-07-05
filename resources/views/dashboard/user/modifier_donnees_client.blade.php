@extends('dashboard.user.layouts.User-dash-layout')
@section('title','User dashboard')
 
  
 @section('content')

 <div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
    <div class="card-header ">
        <h4 ><strong> Modification du profile </strong> <a href="{{route('user.profil_client')}}" class="btn btn-danger float-right">Retour</a></h4>
        
      </div>
    <div class="card-body p-5 shadow-5 text-center" >
     
        {{-- {{route('user.editer_donnee_client')}} --}}
        
        <form action="{{route('user.editer_donnees_client')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
          <input type="hidden" name="cid" value="{{$Info_client->id}}">
          <!-- 2 column grid layout with text inputs for the first and last names -->
    
          <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline">
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{$Info_client->prenom}}">
                    <label class="form-label" for="prenom">Prénom</label>
                    <span class="text-danger">@error('prenom'){{$message}}@enderror</span>
                  </div>
                </div>
    
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{$Info_client->nom}}"/>
                <label class="form-label" for="nom">Nom</label>
                <span class="text-danger">@error('nom'){{$message}}@enderror</span>
              </div>
            </div>
    
    
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="cin" class="form-control" placeholder="cin" value="{{$Info_client->cin}}">
                <label class="form-label" for="cin">CIN</label>
                <span class="text-danger">@error('cin'){{$message}}@enderror</span>
              </div>
  
              </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="telephone" class="form-control" placeholder="téléphone" value="{{$Info_client->telephone}}"/>
                <label class="form-label" for="telephone">Téléphone</label>
                <span class="text-danger">@error('telephone'){{$message}}@enderror</span>
             </div>
            </div>
  
          </div>
          <div class="form-outline mb-4">
            <input type="text" name="numeroPermis" class="form-control" placeholder="Numéro Permis" value="{{$Info_client->numeroPermis}}">
            <label class="form-label" for="numeroPermis">Numéro Permis</label>
            <span class="text-danger">@error('numeroPermis'){{$message}}@enderror</span>
          </div>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" name="ville" class="form-control" placeholder="ville" value="{{$Info_client->ville}}">
                <label class="form-label" for="ville">ville</label>
                <span class="text-danger">@error('ville'){{$message}}@enderror</span>
              </div>
  
              </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="number" name="codePotal" class="form-control" placeholder="codePotal" value="{{$Info_client->codePotal}}"/>
                <label class="form-label" for="codePotal">Code Potal</label>
                <span class="text-danger">@error('codePotal'){{$message}}@enderror</span>
             </div>
            </div>
  
          </div>
  
          <div class="form-outline  mb-4">
            <input type="email" name="email" class="form-control" placeholder="email" value="{{$Info_client->email}}" >
            <label class="form-label" for="email">Email</label>
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
          </div>
  
          <div class="form-outline mb-4">
            <input type="text" name="adressClient" class="form-control" placeholder="entrer votre adress " value="{{$Info_client->adressClient}}">
            <label class="form-label" for="adressClient">Adress Client</label>
            <span class="text-danger">@error('adressClient'){{$message}}@enderror</span>
          </div>
          <div class="form-outline mb-4">
            <input type="file" name="picture" class="form-control" placeholder="picture" value="{{asset('/uploads/Clients/'.$Info_client->picture)}}">
            <label class="form-label" for="picture">image</label>
            <span class="text-danger">@error('picture'){{$message}}@enderror</span>
          </div>
    
    
    
          <!-- Submit button -->
          <div class="form-group mb-3 ">
           
            <button type="submit" class="btn btn-primary float-left">Valider modification </button>
    
        </div>
    
    
    
        </form>
      </div>
    
    </div>
  
 @endsection