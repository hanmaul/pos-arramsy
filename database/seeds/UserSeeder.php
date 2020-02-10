<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'arramsy',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'level' => 'Admin Utama'   
        ]);

        DB::table('users')->insert([
            'name' => 'hanmaul',
            'email' => 'gudang@gmail.com',
            'password' => bcrypt('123123'),
            'level' => 'Admin Gudang'
        ]);

        DB::table('users')->insert([
            'name' => 'farhan',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('123123'),
            'level' => 'Kasir'
        ]);
    }
}
