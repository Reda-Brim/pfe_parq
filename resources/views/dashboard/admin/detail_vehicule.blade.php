{{-- <td>
    <img src=" {{ asset('/uploads/vehicules/'.$Info->voitureImage)}}"  width="70px" height="70px" alt="Image">

 
  </td>

<td>{{$Info->Marque}}</td>
<td>{{$Info->Modele}}</td>
<td>{{$Info->AnneeModele}}</td>
<td>{{$Info->Puissance}}</td>
<td>{{$Info->matricule}}</td>
<td>{{$Info->Carburant}}</td>
<td>{{$Info->dateDebutAssurance}}</td>  
<td>{{$Info->dateFinAssurance}}</td>
<td>{{$Info->dateDebutCertificatVisiteTechnique}}</td>
<td>{{$Info->dateFinCertificatVisiteTechnique}}</td> --}}
@extends('dashboard.admin.layouts.admin-dash-layout')
<style>
  body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 100%;
    height: 70%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 12px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}



.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

  @section('title','Admin dashboard')
 
  
  @section('content')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  
  <div class="container emp-profile ">
              <form method="#">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="profile-img">
                            <img src=" {{ asset('/uploads/vehicules/'.$Info->voitureImage)}}" alt="Image">

                     
                              

                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="profile-head">
                                      <h3>
                                         {{$Info->Marque}} {{$Info->Modele}}
                                      </h3>
                                      <h6>
                                         Voiture du carserv
                                      </h6>
                                    
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A Propos du vehicule</a>
                                  </li>
                                 
                              </ul>
                              <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Matricule</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$Info->matricule}}</p>
                                                </div>
                                            </div>
                                
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Marque et modele du voiture</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$Info->Marque}} {{$Info->Modele}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <label>Année Modele</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>{{$Info->AnneeModele}}</p>
                                              </div>
                                          </div>
 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Puissance</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$Info->Puissance}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Carburant</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$Info->Carburant}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Date Debut Assurance</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{$Info->dateDebutAssurance}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <label>Date Fin Assurance</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>{{$Info->dateFinAssurance}}</p>
                                              </div>
                                          </div>
 
                                          <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Debut Certificat Visite Technique</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$Info->dateDebutCertificatVisiteTechnique}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                              <label>Date Fin Certificat Visite Technique</label>
                                          </div>
                                          <div class="col-md-6">
                                              <p>{{$Info->dateFinCertificatVisiteTechnique}}</p>
                                          </div>
                                      </div>
                                </div>
  
                            </div>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <a  class=" btn btn-primary"  href="../modifier_vehicule/{{$Info->id}}">Modifier</a>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                  
                      </div>
                      <div class="col-md-8">
 
                      </div>
                  </div>
              </form>           
          </div>
    
  @endsection