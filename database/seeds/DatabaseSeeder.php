<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(TokoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(PpnSeeder::class);
        $this->call(PersSeeder::class);
    }
}
