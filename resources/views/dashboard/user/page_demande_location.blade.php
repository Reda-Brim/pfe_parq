@extends('dashboard.user.layouts.user-dash-layout')

@section('title','User dashboard')


@section('content')

<div class="container">



    <div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
        <div class="card-header ">
            <h4 > <a href="{{route('user.vehicules_disponible')}}" class="btn btn-danger float-right">Retour</a></h4>
            
          </div>
        <div class="card-body p-5 shadow-5 text-center" >
         
        
            
            <form action="{{route('user.demande_location')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="date" name="dateDebutLocation_demande" class="form-control" placeholder="date Debut Location" value="{{old('dateDebutLocation_demande')}}">
                        <label class="form-label" for="dateDebutLocation_demande">Date Debut Location </label>
                        <span class="text-danger">@error('dateDebutLocation_demande'){{$message}}@enderror</span>
                      </div>
                    </div>

        
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" name="dateFinLocation_demande" class="form-control" placeholder="date Fin Location" value="{{old('dateFinLocation_demande')}}"/>
                    <label class="form-label" for="dateFinLocation_demande">Date Fin Location</label>
                    <span class="text-danger">@error('dateFinLocation_demande'){{$message}}@enderror</span>
                  </div>
                </div>
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