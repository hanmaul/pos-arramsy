<?php

use Illuminate\Database\Seeder;

class PpnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppns')->insert([
            'stok_minimum' => '12',
            'ppn' => '20',
            'created_at' => '2020-02-12 00:00:00.000000'
        ]);
    }
}
