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
        });
        Schema::create('data_merk', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('data_supplier', function (Blueprint $table) {
            $table->id();
        });

        // Schema::create('data_barang', function (Blueprint $table) {
        //     $table->id();
        // });
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
