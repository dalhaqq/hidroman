<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatNutrisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_nutrisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gully_id')->constrained('gully');
            $table->foreignId('nutrisi_id')->constrained('inventory');
            $table->integer('jml_nutrisi');
            $table->date('tanggal');
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
        Schema::dropIfExists('riwayat_nutrisi');
    }
}
