<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('description');
            $table->integer('status')->default(0);
            $table->integer('message_id');
            $table->boolean('approved_contractor1')->default(False);
            $table->boolean('approved_contractor2')->default(False);
            $table->integer('contractor1_id');
            $table->integer('contractor2_id');
            $table->integer('contractor1_good_id');
            $table->integer('contractor2_good_id');
            $table->integer('contractor1_good_quantity');
            $table->integer('contractor2_good_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
