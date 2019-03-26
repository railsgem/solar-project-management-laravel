<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEavAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eav_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eav_entity_name');
            $table->string('eav_entity_model');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('eav_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('eav_entity_id');
            $table->string('attribute_code');
            $table->string('backend_type');
            $table->string('frontend_input');
            $table->string('frontend_label');
            $table->boolean('is_required');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('eav_entity_id')->references('id')->on('eav_entity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('eav_attributes');
        Schema::dropIfExists('eav_entity');
        Schema::disableForeignKeyConstraints();
    }
}
