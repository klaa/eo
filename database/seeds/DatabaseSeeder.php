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
        $this->call([GroupSeeder::class,PermissionSeeder::class,UserSeeder::class,NganhSeeder::class,DiaDiemSeeder::class,LopSeeder::class,MonSeeder::class]);        
    }
}
