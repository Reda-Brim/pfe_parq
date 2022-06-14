


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id(); 
            $table->string('cinClient_demande');
            $table->string('matriculeVehicules_demande');
            $table->enum('typeDemande', ['Vente', 'location']);
            $table->date('dateDebutLocation_demande')->nullable();
            $table->date('dateFinLocation_demande')->nullable();
            $table->date('dateAchat_demande')->nullable();
            $table->enum('status_demande', ['En cours', 'Approuvé','Refuser'])->default('En cours');
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
        Schema::dropIfExists('demandes');
    }
}
