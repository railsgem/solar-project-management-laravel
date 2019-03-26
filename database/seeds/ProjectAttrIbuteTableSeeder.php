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
        $projects = App\Project::all();
        $faker = Faker\Factory::create();
        $productAttributes = \App\EavAttribute::where('eav_entity_id', 1)->get();
        foreach ($projects as $project) {
            foreach ($productAttributes as $productAttribute) {
                \App\ProjectAttribute::create(
                    [
                        'project_id' => $project->id,
                        'name' => $productAttribute['attribute_code'],
                        'value' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                    ]
                );
            }
        }

    }
}
