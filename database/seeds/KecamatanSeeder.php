<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Ajung']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Ambulu']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Arjasa']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Bangsalsari']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Balung']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Gumukmas']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Jelbuk']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Jengawah']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Jombang']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Kalisat']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Kaliwates']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Kencong']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Ledokombo']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Mayang']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Mumbulsari']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Panti']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Pakusari']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Patrang']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Puger']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Rambipuji']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Semboro']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Sumberbaru']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Sumberjambe']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Sumbersari']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Tanggul']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Tempurejo']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Umbulsari']);
      DB::table('kecamatan')->insert(['nama_kecamatan' => 'Wuluhan']);
    }
}
