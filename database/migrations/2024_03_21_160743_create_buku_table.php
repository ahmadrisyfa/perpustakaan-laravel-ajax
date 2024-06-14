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
            $table->string('pengarang')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('isbn')->nullable();
            $table->string('tahun')->nullable();
            $table->string('sampul_buku');
            $table->string('sampul_buku_belakang');
            $table->integer('stok');
            $table->unsignedBigInteger('rak_id');            
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rak_id')->references('id')->on('rak')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('CASCADE');
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
