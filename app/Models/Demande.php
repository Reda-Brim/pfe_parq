<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $table='demandes';
    protected $fillable=[


       
        'cinClient_demande',
        'matriculeVehicules_demande',
        'typeDemande', 
        'dateDebutLocation_demande',     
        'dateFinLocation_demande',
        'dateAchat_demande',
        'status_demande',

        
    ];
}