<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'unit' => 'pcs',
            'created_at' => '2020-02-12 00:00:00.000000'
        ]);
    }
}
