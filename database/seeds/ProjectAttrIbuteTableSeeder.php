<?php

use Illuminate\Database\Seeder;

class ProjectAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProjectAttribute::class, 2000)->create();
    }
}
