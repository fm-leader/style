<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lib_cmd');
            $table->date('date_cmd');
            $table->date('rdv_cmd');
            $table->unsignedBigInteger('prix_cmd');
            $table->string('echantillon_cmd');

            $table->string('description_cmd')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('modele_id');
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
