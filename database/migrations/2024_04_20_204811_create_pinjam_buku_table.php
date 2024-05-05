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
        Schema::create('pinjam_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('murid_id');
            $table->string('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_di_kembalikan');
            $table->string('jumlah_denda')->default('0');
            $table->string('status')->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('CASCADE');
            $table->foreign('murid_id')->references('id')->on('murid')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam_buku');
    }
};
