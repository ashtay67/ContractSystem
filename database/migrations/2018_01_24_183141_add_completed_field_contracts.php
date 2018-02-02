<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompletedFieldContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
           $table->boolean('completed_contractor1')->default(false);
           $table->boolean('completed_contractor2')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
           if (Schema::hasColumn('contracts', 'completed_contractor1')) {
                $table->dropColumn('completed_contractor1');

           }

           if (Schema::hasColumn('contracts', 'completed_contractor2')) {
                $table->dropColumn('completed_contractor2');

           }
        });
    }
}
