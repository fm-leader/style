<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_employe');
            $table->string('fonction_employe');
            // $table->enum('fonction_employe', ['Brodeur', 'Decoupeur','Secretaire', 'Administrateur','Monteur', 'Finisseur','Piqueur', 'Finisseur','Piqueur'])->default('Monteur');
            $table->string('telephone_employe')->unique();
            $table->string('adresse_employe')->nullable();
            $table->string('photo_employe')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
