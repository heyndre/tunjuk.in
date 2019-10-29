<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKulinerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliner_comments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('kuliner_id');
          $table->boolean('approved');
          $table->date('tanggal_visitasi');
          $table->string('judul');
          $table->string('detail');
      });

      Schema::table('kuliner_comments', function($table){
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('kuliner_id')->references('id')->on('kuliner')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign([kuliner_id]);
        Schema::dropForeign([user_id]);
        Schema::dropIfExists('kuliner_comments');
    }
}
