<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldLevelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //menambahkan field level
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('level');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
