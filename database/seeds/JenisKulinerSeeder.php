<?php

use Illuminate\Database\Seeder;

class JenisKulinerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Seafood']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Chinese food']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Japanese food']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Continental food']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Korean food']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Javanese food']);
        DB::table('category_kuliner')->insert(['jenis_kuliner' => 'Tanpa kategori']);
    }
}
