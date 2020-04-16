<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progressions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lib_progres');
            $table->date('datdeb_progres')->nullable();
            $table->date('datfin_progres')->nullable();
            $table->unsignedBigInteger('prix_progres')->nullable();
            $table->text('materiel_progres')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progressions');
    }
}
