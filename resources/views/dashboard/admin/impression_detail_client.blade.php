<html>
    <head>

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
              width: 70%;
              height: 100%;
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
          @media print{
    #imprimer{
        display: none;
    }
  }
          </style>
    </head>
    <body>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container emp-profile ">
            <div class="col-12">
            
                <img  class="d-flex justify-content-center" src="{{ asset('/uploads/logo.png')}}" alt="logo" />  <br>
                    </div>
                    <form method="#">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                 
                                      <img src="{{ asset('/uploads/Clients/'.$Info->picture)}}"   alt="Image">
                                    
                                    {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> --}}
      
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h3>
                                               {{$Info->prenom}} {{$Info->nom}}
                                            </h3>
                                            <h6>
                                                Client du carserv
                                            </h6>
                                          
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A Propos du client</a>
                                        </li>
                                       
                                    </ul>
                                    <div class="tab-content profile-tab" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label>Cin client</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <p>{{$Info->cin}}</p>
                                                      </div>
                                                  </div>
         
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label>Nom Prénom</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <p>{{$Info->nom}} {{$Info->prenom}}</p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <label>numeroPermis</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{$Info->numeroPermis}}</p>
                                                    </div>
                                                </div>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label>Email</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <p>{{$Info->email}}</p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label>Telephone</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <p>{{$Info->telephone}}</p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <label>Ville</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <p>{{$Info->ville}}</p>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <label>codePotal</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{$Info->codePotal}}</p>
                                                    </div>
                                                </div>
                                      </div>
        
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                             
                                <button  id='imprimer' class=" btn btn-primary"  onclick="window.print()"  <i class="fa fa-print" ></i>imprimer</a>
                                  
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
    </body>
</html>