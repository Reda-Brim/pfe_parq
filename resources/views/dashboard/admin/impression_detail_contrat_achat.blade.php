{{-- {{$Info->numeroContrat}}
{{$Info->cinClient}}
{{$Info->nom}}
{{$Info->prenom}}
{{$Info->numeroPermis}}
{{$Info->adressClient}}
{{$Info->telephone}}
{{$Info->email}}
{{$Info->ville}}
{{$Info->codePotal}}
{{$Info->Marque}}
{{$Info->matriculeVehicules}}
{{$Info->Modele}}
{{$Info->AnneeModele}}
{{$Info->Puissance}}
{{$Info->Carburant}}
{{$Info->dateDebutAssurance}}
{{$Info->dateFinAssurance}}
{{$Info->dateDebutCertificatVisiteTechnique}}
{{$Info->dateFinCertificatVisiteTechnique}}
{{$Info->typePaiement}}
{{$Info->prixAchatVehicules}}
{{$Info->dateAchatVehicules}} --}}

<!DOCTYPE html>
<html>
    <head>
        <title> Contrat Achat</title>
        <meta charset="utf-8"></meta>
        <style>
            h1{
                color:rgb(201, 8, 8) ;
            }
            h2{
                color: blue ;
            }
            .fic{
                margin-left: 10%;
            }
            .monBoutton {
                background-color: rgb(192, 5, 5);
    Color:white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer; 
    box-shadow: 0 8px 16px 0 grey;
    text-decoration: none;
    margin-left: 90%;
  }

  @media print{
    #imprimer{
        display: none;
    }}

        </style>
    </head>
    <body>
      <img  class="d-flex justify-content-start" src="{{ asset('/uploads/logo.png')}}" alt="logo" />  
      <button id='imprimer' onclick="window.print()" class="monBoutton" class="fa fa-print" ><i  ></i>Imprimer  </button>

        <center><h1 > Contrat d'achat d'une voiture</h1></center>
        <div class="fic"> 
             ENTRE LES SOUSSIGNES, <br><br>
        Appelé ci-après le loueur <strong>******</strong>, ET ci-après le locataire<strong> *******</strong>,
        
        <br><br>
        IL A ETE CONVENU CE QUI SUIT; <br>
        <h2> 1.1 - Nature  et date d'effet du contrat </h2>
        Le loueur met à disposition du locataire, un véhicule de marque <strong>{{$Info->Marque}}</strong> , immatriculé <strong>{{$Info->matriculeVehicules}}</strong>,
        Kilométrage du véhicule : <strong>{{$Info->kilometrage}}</strong> kms 
         à titre onéreux et à compter du <strong>****</strong>prix<strong>***** </strong>par <strong>***</strong>type paiement <strong>****************************</strong>.Du <strong>****************************</strong> jusqu'au <strong>****************************</strong>
                    
        <h2>1.2 - Etat du véhicule</h2>
        Lors de la remise du véhicule et lors de sa restitution, un procès-verbal de l'état du véhicule sera établi
        entre le locataire et le loueur.<br>
        Le véhicule devra être restitué le même état que lors de sa remise. Toutes les détériorations sur le
        véhicule constatées sur le PV de sortie seront à la charge du locataire.<br>
        Le locataire certifie être en possession du permis l'autorisant à conduire le présent véhicule. 
        <h2>1.3 - Prix de la location du de la voiture </h2>
        Les parties s'entendent sur un prix de location <strong>****************************</strong> DHS par jour.
        <h2> 1.4 - Durée et restitution de la voiture </h2>
        Le contrat est à durée indéterminée. Il pourra y être mis fin par chacune des parties à tout moment en
        adressant un courrier recommandé en respectant un préavis d'un mois. 
        <h2> 1.5 - Autres éléments et accessoires </h2>    
        Le locataire prendra en charge l'ensemble des charges afférentes à la mise à disposition du véhicule :
        <ul>
            <li>  Frais d'entretien du véhicule  </li>
            <li>  Impôts et taxes liés au véhicule  </li>
            <li>   Les frais d'essence </li>
            <li>    L'assurance du véhicule</li>

        </ul>
<center> 
        Fait en deux exemplaires originaux remis à chacune des parties, 
        A <strong>**********</strong>, le <strong>********</strong> <br><br>
        <table border="1">
          
            <tr> <!-- tr cad une ligne-->
                <th> Le locataire<br>
                    signature précédée de la mention manuscrite<br>
                    </th> 
                <th>Le loueur<br>
                    signature précédée de la mention manuscrite<br>
                     </th>
              
            </tr>
                  </table>
                </center>
                  <br><br> <br><br> 

                </div>
                
    </body>
</html>