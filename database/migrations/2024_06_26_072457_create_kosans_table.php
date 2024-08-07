<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kosans', function (Blueprint $table) {
            $table->id(); // memastikan tipe data yang sesuai
            $table->unsignedBigInteger('pemilik_id'); // menggunakan tipe data yang sama dengan id di tabel pemiliks
            $table->string('nama');
            $table->string('alamat');
            $table->string('gender');
            $table->string('fasilitas');
            $table->string('jmlh_kamar');
            $table->string('status');
            $table->string('harga');
            $table->string('deskripsi');
            $table->string('image');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('pemilik_id')->references('id')->on('pemiliks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kosans');
    }
};
