<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            // $table->string('slug');
            $table->string('judul');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('isbn');
            $table->string('tahun');
            $table->string('sampul_buku');
            $table->integer('stok');
            $table->integer('rak_id');            
            $table->integer('category_id');
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
        Schema::dropIfExists('buku');
    }
};
