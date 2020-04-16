<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lib_modele');
            $table->string('prix_modele');
            $table->string('image_modele');
            $table->enum('etat_modele', ['disponible', 'rupture'])->default('disponible');
           // $table->integer('etat_modele')->nullable();
            $table->text('description_modele')->nullable();

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
        Schema::dropIfExists('modeles');
    }
}
