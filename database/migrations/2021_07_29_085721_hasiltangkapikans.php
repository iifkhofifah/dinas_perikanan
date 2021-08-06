<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hasiltangkapikans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasiltangkapikans', function (Blueprint $table) {
            $table->increments('id_hasil');
            $table->integer('lokasi_id');
            $table->date('tgl');
            $table->string('jenis_ikan');
            $table->string('alat_tangkap');
            $table->string('volume_kg');
            $table->string('harga_kg');
            $table->string('total_harga');
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
        Schema::dropIfExists('hasiltangkapikans');
    }
}
