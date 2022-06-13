@extends('dashboard.admin.layouts.admin-dash-layout')

@section('title','Admin dashboard')


@section('content')

<div class="container">



    <div class="content" style=" background: hsla(0, 0%, 100%, 0.55);margin-left: 25%; margin-right:25%">
        <div class="card-header ">
            <h4 ><strong>Modifier Vehicule</strong> <a href="{{route('admin.Liste_vehicules')}}" class="btn btn-danger float-right">Retour</a></h4>
            
          </div>
        <div class="card-body p-5 shadow-5 text-center" >
         
        
            
            <form action="{{route('admin.editer_vehicule')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                      <input type="text" name="Marque" class="form-control" placeholder="Marque" value="{{$Info->Marque}}" >
                      <label class="form-label" for="Marque">Marque</label>
                      <span class="text-danger">@error('Marque'){{$message}}@enderror</span>
                      </div>
                    </div>
        
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="Modele" name="Modele" class="form-control" placeholder="Modele" value="{{$Info->Modele}}">
                    <label class="form-label" for="Modele">Modele</label>
                    <span class="text-danger">@error('Modele'){{$message}}@enderror</span>
        
        
                  </div>
                </div>
              </div>
        
        
              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="matricule" class="form-control" placeholder="matricule" value="{{$Info->matricule}}"/>
                      <label class="form-label" for="matricule">matricule</label>
                      <span class="text-danger">@error('matricule'){{$message}}@enderror</span>
                      </div>
                    </div>
        
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="number" name="AnneeModele" class="form-control" placeholder="AnneeModele" value="{{$Info->AnneeModele}}" >
                    <label class="form-label" for="AnneeModele">Année du modele</label>
                    <span class="text-danger">@error('AnneeModele'){{$message}}@enderror</span>
        
                  </div>
                </div>
        
        
              </div>
              
              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="Carburant" class="form-control" placeholder="Carburant" value="{{$Info->Carburant}}">
                      <label class="form-label" for="Carburant">Carburant</label>
                      <span class="text-danger">@error('Carburant'){{$message}}@enderror</span>
                    </div>
                  </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" name="Puissance" class="form-control" placeholder="Puissance" value="{{$Info->Puissance}}"/>
                        <label class="form-label" for="Puissance">Puissance</label>
                        <span class="text-danger">@error('Puissance'){{$message}}@enderror</span>
                      </div>
                </div>
        
        
              </div>
        
        
        
         
           
        
        
                  <div class="form-outline mb-4">
                    <input type="number" name="kilometrage" class="form-control" placeholder="kilometrage" value="{{$Info->kilometrage}}"/>
                    <label class="form-label" for="kilometrage">kilometrage</label>
                    <span class="text-danger">@error('kilometrage'){{$message}}@enderror</span>
                  </div>
            
              
              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="date" name="dateDebutAssurance" class="form-control" placeholder="dateDebutAssurance " value="{{$Info->dateDebutAssurance}}">
                        <label class="form-label" for="dateDebutAssurance">date Debut Assurance</label>
                        <span class="text-danger">@error('dateDebutAssurance'){{$message}}@enderror</span>
                      </div>
                    </div>
        
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" name="dateFinAssurance" class="form-control" placeholder="dateFinAssurance" value="{{$Info->dateFinAssurance}}"/>
                    <label class="form-label" for="dateFinAssurance">date Fin Assurance</label>
                    <span class="text-danger">@error('dateFinAssurance'){{$message}}@enderror</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="date" name="dateDebutCertificatVisiteTechnique" class="form-control" placeholder="date Debut Certificat Visite Technique " value="{{$Info->dateDebutCertificatVisiteTechnique}}">
                        <label class="form-label" for="dateDebutCertificatVisiteTechnique">date Debut Certificat Visite Technique</label>
                        <span class="text-danger">@error('dateDebutCertificatVisiteTechnique'){{$message}}@enderror</span>
                      </div>
                    </div>
        
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" name="dateFinCertificatVisiteTechnique" class="form-control" placeholder="dateFinCertificatVisiteTechnique" value="{{$Info->dateFinCertificatVisiteTechnique}}"/>
                    <label class="form-label" for="dateFinCertificatVisiteTechnique">date Fin Certificat Visite Technique</label>
                    <span class="text-danger">@error('dateFinCertificatVisiteTechnique'){{$message}}@enderror</span>
                  </div>
                </div>
              </div>
        
        
              <div class="form-outline mb-4">
                <input type="file" name="voitureImage" class="form-control" placeholder="voitureImage" value="{{old ('voitureImage')}}">
                <label class="form-label" for="voitureImage">image voiture</label>
                <span class="text-danger">@error('voitureImage'){{$message}}@enderror</span>
              </div>
        
        
        
        
              <!-- Submit button -->
              <div class="form-group mb-3 ">
               
                <button type="submit" class="btn btn-primary float-left">Appliquer modification</button>
        
            </div>
        
        
        
            </form>
          </div>
        
        </div>






    {{-- <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                       Modifier Vehicule 
                        <a href="{{route('admin.Liste_vehicules')}}" class="btn btn-danger float-right">Retour</a>                      
                    </h4>                   
                </div>
                <div class="card-body">
                    <form action="{{route('admin.editer_vehicule')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group mb-3">
                            <label for="matricule">Matricule </label>
                            <input type="text" name="matricule" class="form-control" value="{{$Info->matricule}}">
                            <span style="color:red">@error('matricule'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="anneeModele">Année Modele</label>
                            <input type="text" name="AnneeModele" class="form-control" value="{{$Info->AnneeModele}}">
                            <span style="color:red">@error('AnneeModele'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="Puissance">Puissance</label>
                            <input type="text" name="Puissance" class="form-control" value="{{$Info->Puissance}}">
                            <span style="color:red">@error('Puissance'){{$message}}@enderror</span>
                        </div>
                         <div class="form-group mb-3">
                            <label for="CoutParJour">Cout Par Jour</label>
                            <input type="text" name="CoutParJour" class="form-control" value="{{$Info->CoutParJour}}">
                            <span style="color:red">@error('CoutParJour'){{$message}}@enderror</span>
                        </div> 
                        <div class="form-group mb-3">
                            <label for="modele">Modele</label>
                            <input type="text" name="Modele" class="form-control" value="{{$Info->Modele}}">
                            <span style="color:red">@error('Modele'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="carburant">Carburant </label>
                            <input type="text" name="Carburant" class="form-control" value="{{ $Info->Carburant }}">
                            <span style="color:red">@error('Carburant'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="voitureImage" >Voiture image</label>
                            <input type="file" name="voitureImage"  class="form-control" value="{{ $Info->voitureImage }}">
                            <span style="color:red">@error('voitureImage'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Appliquer modification </button>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div> --}}
</div>

@endsection