<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function(Blueprint $table){
            $table->id();
        });
        Schema::create('bagian', function(Blueprint $table){
            $table->id();
        });
        Schema::create('lokasi', function(Blueprint $table){
            $table->id();
        });
        Schema::create('user', function(Blueprint $table){
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
