@extends('dashboard.user.layouts.User-dash-layout')
@section('title','User dashboard')
 
  
 @section('content')
 
<div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
  <div class="card-header ">
      <h4 ><strong> Modifier Client </strong> <a href="{{route('user.profil_client')}}" class="btn btn-danger float-right">Retour</a></h4>
      
    </div>
  <div class="card-body p-5 shadow-5 text-center" >
   
  
      
      <form action="{{route('user.editer_password')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
       
 

         <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="password" name="password" class="form-control" placeholder="password" />
              <label class="form-label" for="password">Password</label>
              <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
          </div>
        

          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <input type="password" name="cpassword" class="form-control" placeholder="confirm password" />
              <label class="form-label" for="cpassword">confirm Mot de passe</label>
              <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>
            </div>
          </div>
        </div> 
       
  
  
        <!-- Submit button -->
        <div class="form-group mb-3 ">
         
          <button type="submit" class="btn btn-primary float-left">Changer mot de passe </button>
  
      </div>
  
  
  
      </form>
    </div>
  
  </div>

  @endsection