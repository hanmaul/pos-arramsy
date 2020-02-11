<?php

use Illuminate\Database\Seeder;

class PersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persentase_keuntungans')->insert([
            'persentase_keuntungan' => '50',
            'created_at' => '2020-02-12 00:00:00.000000'
        ]);
    }
}
