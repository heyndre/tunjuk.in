<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KulinerImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('kuliner', function (Blueprint $table) {
          $table->string('image')->nullable()->after('nama');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('kuliner', function (Blueprint $table) {
          $table->dropColumn('image');
      });
    }
}
