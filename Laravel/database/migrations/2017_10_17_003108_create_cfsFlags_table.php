<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCfsFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfsFlags', function (Blueprint $table) {

            //  Primary Key
            $table->increments('id');
            $table->string('cfsFlag');
            $table->timestamps();
        });

        Schema::table('stores', function(Blueprint $table) {

            //  Foreign Key
            $table->foreign('cfsFlag_id')->references('id')->on('cfsFlags')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfsFlags');
    }
}
