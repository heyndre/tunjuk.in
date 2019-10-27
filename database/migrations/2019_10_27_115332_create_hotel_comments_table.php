<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');
            $table->boolean('approved');
            $table->date('tanggal_visitasi');
            $table->string('judul');
            $table->string('detail');
        });

        Schema::table('hotel_comments', function($table){
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('hotel_id')->references('id')->on('hotel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign([hotel_id]);
        Schema::dropForeign([user_id]);
        Schema::dropIfExists('hotel_comments');
    }
}
