<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_lists', function (Blueprint $table) {

            $table->id();

            $table->string('nama_layanan');

            $table->decimal('harga',10,2);

            $table->text('keterangan')->nullable();

            $table->string('status')->default('Aktif');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_lists');
    }
};