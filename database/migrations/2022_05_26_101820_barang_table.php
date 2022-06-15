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
            $table->bigInteger('jumlah');
            $table->integer('harga');
            $table->string('tanggal_pengadaan');
            $table->integer('depresiasi')->nullable();
            $table->integer('lama_depresiasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->bigInteger('total_harga')->nullable();
            $table->timestamps();

            $table->foreign('databarang_id')->references('id')->on('data_barang')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('supplier_id')->references('id')->on('data_supplier')
                ->onUpdate('cascade')->onDelete('cascade');
        });


        Schema::create('penempatan', function (Blueprint $table) {
            $table->id('penempatan_id');
            $table->unsignedBigInteger('pengadaan_id');
            $table->unsignedBigInteger('bagian_id')->nullable();
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->string('tanggal_penempatan')->nullable();
            $table->string('barcode')->nullable();
            $table->enum('status_ditempatkan', ['0', '1']);
            $table->timestamps();

            $table->foreign('pengadaan_id')->references('id')->on('pengadaan')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('bagian_id')->references('id')->on('bagian')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('lokasi_id')->references('id')->on('lokasi')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penempatan_id');
            $table->integer('nilai_barang')->nullable();
            $table->string('tanggal_depresiasi')->nullable();
            $table->timestamps();

            $table->foreign('penempatan_id')->references('penempatan_id')->on('penempatan')
                ->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('databarang_id')->references('id')->on('data_barang')
            //       ->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('databarang_id')->references('id')->on('data_barang')
            //       ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('riwayat_penempatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penempatan_id')->nullable();
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->string('tanggal_pemindahan')->nullable();
            $table->timestamps();

            $table->foreign('penempatan_id')->references('penempatan_id')->on('penempatan')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('lokasi_id')->references('id')->on('lokasi')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('cetak_barcode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penempatan_id');
            $table->timestamps();

            $table->foreign('penempatan_id')->references('penempatan_id')->on('penempatan')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('opname', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->string('kondisi')->nullable();
            $table->string('tanggal_opname')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('databarang_id')->references('id')->on('data_barang')
            //       ->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('databarang_id')->references('id')->on('data_barang')
            //       ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penempatan');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('riwayat_penempatan');
        Schema::dropIfExists('opname');
    }
}