<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGallerysTable extends Migration
{
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('kosan_id'); // Foreign key field as unsignedBigInteger
            $table->string('judul');
            $table->string('foto');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('kosan_id')->references('id')->on('kosans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallerys'); // Drop table if exists
    }
};
