<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('Marque');
            $table->string('matricule')->unique();
            $table->integer('AnneeModele');
            $table->string('Puissance');
            $table->string('Modele');
            $table->string('Carburant');
            $table->string('voitureImage')->default('Disponible'); 
            $table->integer('disponibilite')->default(0);
            $table->decimal('kilometrage', 10, 2);
            // $table->enum('typeAction', ['Vente', 'location'])->nullable();
            // $table->integer('CoutParJour');
            // $table->decimal('CoutParJour', 10, 2)->nullable();
            // $table->integer('dureeLocation')->nullable();
            // $table->date('dateDebutLocation')->nullable();
            // $table->date('dateFinLocation')->nullable();
            $table->date('dateDebutAssurance');
            $table->date('dateFinAssurance');
            
            $table->date('dateDebutCertificatVisiteTechnique');
            $table->date('dateFinCertificatVisiteTechnique');
            $table->date('dateDebutL')->nullable();
            $table->date('dateFinL')->nullable();
            
            // $table->decimal('prixAchat', 10, 2)->nullable();
            // $table->date('dateAchat ')->nullable();


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
        Schema::dropIfExists('vehicules');
    }
}
