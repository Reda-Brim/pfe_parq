<?php


namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin;
use App\Models\Contrat;
use App\Models\User;
use App\Models\Vehicule;

class MultiStepForm extends Component
{
    use WithFileUploads;
    public $numeroContrat;
    public $typeContrat;

    public $cinClient;
    public $nomClient;
    public $prenomClient;
    public $adressClient;
    public $codePostalClient;
    public $telephoneClient;
    public $numeroPermisClient;
    public $villeClient;

    public $matriculeVehicules;
    public $marqueVehicules;
    public $modeleVehicules;
    public $puissanceVehicules;
    public $carburantVehicules;
    public $KilometrageVehicules;
    public $typePaiement;
  
    public $dateDebutAssuranceVehicules;
    public $dateFinAssuranceVehicules;
    public $dateDebutCertificatVisiteTechniqueVehicules;
    public $dateFinCertificatVisiteTechniqueVehicules;

    public $dateDebutLocationVehicules;
    public $dateFinLocationVehicules;
    public $prixTotalLocationVehicules;
    public $dureeLocationVehicules;

    public $dateAchatVehicules;
    public $prixAchatVehicules;

    public $totalSteps=2;
    public $currentStep=1;


    public function mount(){
        $this->currentStep = 1;
    }


    public function render()
    {
        return view('livewire.multi-step-form');
    }


    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }


    public function validateData(){
        if($this->currentStep==1){
            
            $this->validate([
                'numeroContrat'=>'required|string',
                'typeContrat'=>'required|in:Vente,location',
                'cinClient'=>'required|cin|exists:users,cin',
                'matriculeVehicules'=>'required|matricule|exists:vehicules,matricule'
            ],[
                'cinClient.exists'=>'Cet client n\'existe pas dans la table des clients',
                'matriculeVehicules.exists'=>'Cet vehicule n\'existe pas dans la table des vehicules'
            ]);

    

        }
        elseif($this->currentStep==2 ){
            $this->validate([
                'coutParJourVehicules'=>'required',
                'dureeLocationVehicules'=>'required',
                'dateDebutLocationVehicules'=>'required',
                'dateFinLocationVehicules'=>'required',
                'typePaiement'=>'required|in:cheque,carteBancaire,especes',
                'prixTotalLocationVehicules'=>'required',

            ]);


        }

        elseif($this->currentStep==2 ){
            $this->validate([
                'dateAchatVehicules'=>'required',
                'prixAchatVehicules'=>'required',
                'typePaiement'=>'required|in:cheque,carteBancaire,especes',
            ]);


        }




    }

    public function registre(){
        // $req = ('INSERT INTO contrat (numeroContrat, cinClient, typeContrat, matriculeVehicules, subscriberId) SELECT id, login, idForum, agree FROM opinions WHERE cin = cinClient');
        $values = array(
            "cinClient"=>$this->cinClient,
            "numeroContrat"=>$this->numeroContrat,
            "typeContrat"=>$this->typeContrat,
            "matriculeVehicules"=>$this->matriculeVehicules,

        );

        Contrat::insert($values);
    }
}
