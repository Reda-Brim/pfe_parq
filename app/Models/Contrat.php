<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    protected $table='contrats';
    protected $fillable=[

        'numeroContrat',
        'cinClient',
        // 'nomClient',
        // 'prenomClient',
        // 'adressClient',
        // 'codePostalClient',
        // 'telephoneClient',
        // 'numeroPermisClient',
        // 'villeClient',
        // 'matriculeVehicules',
        // 'marqueVehicules',
        // 'AnneeModele',
        'puissanceVehicules',
        'coutParJourVehicules', 
        // 'dateDebutAssuranceVehicules',
        // 'dateFinAssuranceVehicules',
        'prixTotalLocationVehicules',     
        // 'modeleVehicules',
        // 'carburantVehicules',
        // 'KilometrageVehicules',
        'dureeLocationVehicules',
        'dateDebutLocationVehicules',
        'dateFinLocationVehicules',
        // 'dateDebutCertificatVisiteTechniqueVehicules',
        // 'dateFinCertificatVisiteTechniqueVehicules',
        'prixAchatVehicules',
        'dateAchatVehicules',
        'typePaiement',
        'typeContrat',
        
    ];

}
