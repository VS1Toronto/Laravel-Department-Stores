<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {

            //  Primary Key
            $table->increments('id');
            $table->string('site');
            $table->string('phoneNumber');
            $table->timestamps();
        });

        Schema::table('stores', function(Blueprint $table) {

            //  Foreign Key
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
