<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'pakaian',
            'created_at' => '2020-02-12 00:00:00.000000'
        ]);
    }
}
