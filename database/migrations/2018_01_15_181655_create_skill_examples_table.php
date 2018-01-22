<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_examples', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->integer('user_id');
            $table->string('link');
            $table->string('file')->nullable()->default(null);


        });

        Schema::create('skill_examples_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id');
            $table->integer('skill_example_id');
            

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_examples');
        Schema::dropIfExists('skill_examples_skills');
    }
}
