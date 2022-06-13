<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $table='vehicules';
    protected $fillable=[

        'matricule',
        'AnneeModele',
        'Puissance',
        'CoutParJour',      
        'Modele',
        'Carburant',
        'voitureImage',
        'kilometrage',
        'Marque',
        'disponibilite',
        // 'typeAction',
        // 'dureeLocation',
        // 'dateDebutLocation',
        // 'dateFinLocation',
        'dateDebutAssurance',
        'dateFinAssurance',
        'dateDebutCertificatVisiteTechnique',
        'dateFinCertificatVisiteTechnique',
        'dateDebutL',
        'dateFinL',
        // 'prixAchat',
        // 'dateAchat',
        
    ];
}
