<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informasi_tokos')->insert([
            'nama' => 'Arramsy-Florist',
            'alamat' => 'Jl. kerja bakti no.7',
            'keterangan' => 'open 07:00 am - 08:00 pm',
            'telepon' => '08976882982',
            'kode_pos' => '13650'
        ]);
    }
}
