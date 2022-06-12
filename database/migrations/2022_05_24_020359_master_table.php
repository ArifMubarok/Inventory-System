<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });

        Schema::create('data_satuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_satuan');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
        Schema::create('data_merk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_merk');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
        Schema::create('data_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->text('alamat');
            $table->string('kota');
            $table->string('fax');
            $table->string('email');
            $table->string('cp');
            $table->text('keterangan');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });

        Schema::create('data_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('satuan_id');
            $table->unsignedBigInteger('merk_id')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->string('name');
            $table->string('keterangan')->nullable();
            $table->string('barcode')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('satuan_id')->references('id')->on('data_satuan')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('merk_id')->references('id')->on('data_merk')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('kategori_id')->references('id')->on('data_kategori')
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
        Schema::dropIfExists('data_kategori');
        Schema::dropIfExists('data_satuan');
        Schema::dropIfExists('data_merk');
        Schema::dropIfExists('data_supplier');
        Schema::dropIfExists('data_barang');
    }
}