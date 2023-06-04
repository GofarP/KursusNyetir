<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kursus', function (Blueprint $table) {
            $table->string('id_kursus')->primary();
            $table->string('id_pelatih');
            $table->string('id_peserta');
            $table->string('id_mobil');
            $table->string('id_paket');
            $table->string('mulai_tanggal');
            $table->string('selesai_tanggal')->nullable();
            $table->enum('status',["Berjalan","Selesai"]);
            $table->bigInteger('total');
            $table->timestamps();


            $table->foreign('id_pelatih')->references('id_pelatih')
            ->on('pelatih')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_peserta')->references('id_peserta')
            ->on('peserta')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_mobil')->references('id_mobil')
            ->on('mobil')
            ->onDelete('cascade')
            ->onUpdate('cascade');



            $table->foreign('id_paket')->references('id_paket')
            ->on('paket')
            ->onDelete('cascade')
            ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
