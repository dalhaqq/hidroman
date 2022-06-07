<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKloterTanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kloter_tanaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gully_id')->nullable()->constrained('gully');
            $table->foreignId('benih_id')->constrained('inventory');
            $table->foreignId('rockwool_id')->constrained('inventory');
            $table->date('tgl_tanam');
            $table->date('tgl_akhir')->nullable();
            $table->integer('jml_nutrisi')->default(0);
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
        Schema::dropIfExists('kloter_tanaman');
    }
}
