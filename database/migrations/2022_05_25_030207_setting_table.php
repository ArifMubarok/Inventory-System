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
        Schema::create('departemen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->string('keterangan');
            $table->enum('status_aktif', ['non-aktif', 'aktif']);
            $table->timestamps();
        });
        Schema::create('bagian', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('departemen_id');
            $table->string('name');
            $table->enum('status', ['0','1']);
            $table->string('keterangan');
            $table->enum('status_aktif', ['aktif','non-aktif']);
            $table->timestamps();

            $table->foreign('departemen_id')->references('id')->on('departemen')
            ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('lokasi', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->string('keterangan');
            $table->enum('status_aktif', ['Non-Aktif', 'Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departemen');
        Schema::dropIfExists('bagian');
        Schema::dropIfExists('lokasi');
        Schema::dropIfExists('user');
    }
}
