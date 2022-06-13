<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numeroContrat')->unique();
            $table->string('cinClient');
            // $table->string('nomClient')->nullable();
            // $table->string('prenomClient')->nullable();
            // $table->string('adressClient')->nullable();
            // $table->integer('codePostalClient')->nullable();
            // $table->string('telephoneClient')->nullable();
            // $table->string('numeroPermisClient')->nullable();
            // $table->string('villeClient')->nullable();

            // $table->string('marqueVehicules')->nullable();
            $table->string('matriculeVehicules');
            // $table->string('modeleVehicules')->nullable();
            // $table->integer('AnneeModele')->nullable();
            
            // $table->string('puissanceVehicules')->nullable();
            // $table->string('carburantVehicules')->nullable();
            // $table->integer('KilometrageVehicules')->nullable();
            $table->enum('typePaiement', ['cheque', 'carteBancaire', 'especes']);
            $table->enum('typeContrat', ['Vente', 'location']);
            // $table->date('dateDebutAssuranceVehicules')->nullable();
            // $table->date('dateFinAssuranceVehicules')->nullable();

            // $table->date('dateDebutCertificatVisiteTechniqueVehicules')->nullable();
            // $table->date('dateFinCertificatVisiteTechniqueVehicules')->nullable();

            $table->date('dateDebutLocationVehicules')->nullable();
            $table->date('dateFinLocationVehicules')->nullable();
            $table->date('dateAchatVehicules')->nullable();

  
            $table->integer('prixTotalLocationVehicules')->nullable();
            $table->integer('coutParJourVehicules')->nullable();
            $table->integer('prixAchatVehicules')->nullable();
            $table->integer('dureeLocationVehicules')->nullable();
          

            $table->foreign('matriculeVehicules')->references('matricule')->on('vehicules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cinClient')->references('cin')->on('users')->onUpdate('cascade')->onDelete('cascade');


            // $table->foreign('matricule')->references('matricule')->on('vehicules');
            // $table->foreign('modele')->references('modele')->on('vehicules');
            // $table->foreign('puissanceVehicules')->references('puissanceVehicules')->on('vehicules');
            // $table->foreign('dateFinCertificatVisiteTechnique')->references('dateFinCertificatVisiteTechnique')->on('vehicules');
            // $table->foreign('Kilometrage')->references('Kilometrage')->on('vehicules');           
            // $table->foreign('cin')->references('cin')->on('users');
            // $table->foreign('nomClient')->references('nom')->on('users');
            // $table->foreign('adressClient')->references('adressClient')->on('users');
            // $table->foreign('prenomClient')->references('prenom')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
