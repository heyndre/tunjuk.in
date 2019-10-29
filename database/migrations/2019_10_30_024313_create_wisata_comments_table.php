<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisataCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('wisata_comments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('wisata_id');
          $table->boolean('approved');
          $table->date('tanggal_visitasi');
          $table->string('judul');
          $table->string('detail');
      });

      Schema::table('wisata_comments', function($table){
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('wisata_id')->references('id')->on('wisata')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign([wisata_id]);
        Schema::dropForeign([user_id]);
        Schema::dropIfExists('wisata_comments');
    }
}
