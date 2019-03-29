<?php

use Illuminate\Database\Seeder;

class ProjectCustomerTableSeeder extends Seeder
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
        foreach ($projects as $project) {
            \App\ProjectCustomer::create(
                [
                    'project_id' => $project->id,
                    'name' => $faker->name,
                    'contact_no' => $faker->phoneNumber,
                    'post_code' => $faker->postcode,
                    'address' => $faker->address,
                ]
            );
        }
    }
}
