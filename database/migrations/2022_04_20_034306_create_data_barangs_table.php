<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_satuan');
            $table->foreignId('id_merk');
            $table->foreignId('id_kategori');
            $table->string('nama_barang');
            $table->text('keterangan');
            $table->string('barcode');
            $table->string('foto')->nullable(); //sementara 
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
        Schema::dropIfExists('data_barangs');
    }
}