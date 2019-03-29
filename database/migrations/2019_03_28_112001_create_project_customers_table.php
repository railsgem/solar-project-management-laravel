<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('post_code');
            $table->string('contact_no');
            $table->string('address');
            $table->unsignedInteger('project_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('project_customers');
        Schema::disableForeignKeyConstraints();
    }
}
