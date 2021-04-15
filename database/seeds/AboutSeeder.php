<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tentang')->insert([
            'id'             => '1',
            'nama_organisasi'=> 'Perpustakaan Digital Unisma',
            'deskripsi'      => 'Unisma',
            'alamat'         => 'Jl. Mayjen Haryono Gg. 10 No.193, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            'no_telp'        => '0341 551932',
            'email'          => 'lib@gmail.com',

        ]);
    }
}
