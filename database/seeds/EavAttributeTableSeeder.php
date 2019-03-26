<?php

use Illuminate\Database\Seeder;

class EavAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('eav_attributes')->insert(
            [
                'eav_entity_id' => 1,
                'attribute_code' => 'project_address',
                'backend_type' => 'string',
                'frontend_input' => 'text',
                'frontend_label' => 'Project Address',
                'is_required' => true
            ]
        );

        DB::table('eav_attributes')->insert(
            [
                'eav_entity_id' => 1,
                'attribute_code' => 'project_install_date',
                'backend_type' => 'date',
                'frontend_input' => 'date',
                'frontend_label' => 'Project Install Date',
                'is_required' => true
            ]
        );

        DB::table('eav_attributes')->insert(
            [
                'eav_entity_id' => 1,
                'attribute_code' => 'project_type',
                'backend_type' => 'string',
                'frontend_input' => 'select',
                'frontend_label' => 'Project Type',
                'is_required' => false
            ]
        );

        DB::table('eav_attributes')->insert(
            [
                'eav_entity_id' => 1,
                'attribute_code' => 'comments',
                'backend_type' => 'string',
                'frontend_input' => 'text',
                'frontend_label' => 'Comments',
                'is_required' => false
            ]
        );

    }
}
