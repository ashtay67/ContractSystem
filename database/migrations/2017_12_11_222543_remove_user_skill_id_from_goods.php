<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUserSkillIdFromGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
           if (Schema::hasColumn('goods', 'user_skill_id')) {
                $table->dropColumn('user_skill_id');

           }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('goods', function (Blueprint $table) {
           $table->integer('user_skill_id');
        });
    }
}
