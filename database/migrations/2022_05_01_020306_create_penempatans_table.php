<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenempatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penempatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengadaan_id');
            $table->foreignId('bagian_id');
            $table->foreignId('lokasi_id');
            $table->text('tanggal_penempatan');
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
        Schema::dropIfExists('penempatans');
    }
}
