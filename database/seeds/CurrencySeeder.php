<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'currency' => 'IDR',
            'created_at' => '2020-02-03 00:00:00.000000'
        ]);
    }
}
