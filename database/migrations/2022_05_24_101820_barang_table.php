<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('databarang_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('kondisi');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('tanggal_pengadaan');
            $table->integer('depresiasi');
            $table->integer('lama_depresiasi');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('databarang_id')->references('id')->on('data_barang')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('supplier_id')->references('id')->on('data_supplier')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaan');
    }
}
