<?php

use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('hotel')->insert([
        'nama' => 'Bandung Permai';
        'alamat' => '';
        'kecamatan' => '';
        'kode_pos' => '';
        'kota'
        'latitude'
        'longitude'
        'tarif_atas'
        'tarif_bawah'
        'deskripsi'
        'verified'
        'image'

      $hotel->nama = ;
      $hotel->alamat = $request->input('alamatHotel');
      $hotel->kecamatan = $request->input('kecamatanHotel');
      $hotel->kode_pos = $request->input('kodePosHotel');
      $hotel->kota = 'Jember';
      $hotel->latitude = $request->input('lintangHotel');
      $hotel->longitude = $request->input('bujurHotel');
      $hotel->tarif_atas = $request->input('tarifAtas');
      $hotel->tarif_bawah = $request->input('tarifBawah');
      $hotel->deskripsi = $request->input('deskripsiHotel');
      $hotel->verified = $request->input('verify');
      $hotel->image = $filename;
    ]);
    }
}
