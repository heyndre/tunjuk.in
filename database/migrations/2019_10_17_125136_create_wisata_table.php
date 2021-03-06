<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nama');
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('kota');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('tarif_atas');
            $table->integer('tarif_bawah');
            $table->string('deskripsi');
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}
