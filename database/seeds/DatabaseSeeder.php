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
        $this->call([
            UsersTableSeeder::class,
            ProjectTableSeeder::class,
            EavEntityTableSeeder::class, // required
            EavAttributeTableSeeder::class,
            ProjectAttributeTableSeeder::class,
            ProjectCustomerTableSeeder::class,
        ]);
    }
}
