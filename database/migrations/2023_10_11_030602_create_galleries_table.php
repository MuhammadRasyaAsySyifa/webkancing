<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('gambar'); // Kolom untuk menyimpan path gambar
            $table->timestamps(); // Kolom otomatis untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};