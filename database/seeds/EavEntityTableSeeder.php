<?php

use Illuminate\Database\Seeder;

class EavEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eav_entity')->insert([
            'eav_entity_name' =>'Project',
            'eav_entity_model' => 'App\Project',
        ]);
    }
}
