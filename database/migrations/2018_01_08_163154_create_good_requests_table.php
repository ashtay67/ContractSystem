<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('name');
            $table->text('description');
            $table->integer('skill_id');
            $table->integer('user_id');
            $table->integer('good_quantity');

        });

        Schema::create('good_requests_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('good_request_id');
            $table->integer('good_id');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_requests');
        Schema::dropIfExists('good_requests_goods');
    }
}
