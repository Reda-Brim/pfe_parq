@extends('dashboard.user.layouts.user-dash-layout')

@section('title','User dashboard')


@section('content')

<div class="container">



    <div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
        <div class="card-header ">
            <h4 > <a href="{{route('user.vehicules_disponible')}}" class="btn btn-danger float-right">Retour</a></h4>
            
          </div>
        <div class="card-body p-5 shadow-5 text-center" >
         
        
            
            <form action="{{route('user.demande_achat')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
              
              <input type="hidden" name="matricule" value="{{$Info->matricule}}">
          
              <!-- 2 column grid layout with text inputs for the first and last names -->    
                <div class="form-outline">
                    <input type="date" name="dateAchat_demande" class="form-control" placeholder="date Achat " value="{{old ('dateAchat_demande')}}" >
                    <label class="form-label" for="dateAchat_demande">date Achat Vehicules</label>
                    <span class="text-danger">@error('dateAchat_demande'){{$message}}@enderror</span>
                    </div>
        
        
        

        
        
        
        
              <!-- Submit button -->
              <div class="form-group mb-3 ">
               
                <button type="submit" class="btn btn-primary float-left">Envoyer Demande</button>
        
            </div>
        
        
        
            </form>
          </div>
        
        </div>






</div>

@endsection