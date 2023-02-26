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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking');
            $table->date('tgl_pinjam');
            $table->integer('lama_pinjam');
            $table->integer('total_harga');
            $table->string('keterangan');
            $table->string('bukti_byr')->nullable();
            $table->string('status')->nullable();
            $table->string('status_mobil')->nullable();
            $table->foreignId('id_mobil');
            $table->foreignId('id_user');
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
        Schema::dropIfExists('bookings');
    }
};
