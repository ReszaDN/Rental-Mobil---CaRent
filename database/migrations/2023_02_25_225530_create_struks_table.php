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
        Schema::create('struks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_struk');
            $table->date('tgl_kembali')->nullable();
            $table->integer('keterlambatan');
            $table->integer('denda');
            $table->foreignId('id_booking');
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
        Schema::dropIfExists('struks');
    }
};
