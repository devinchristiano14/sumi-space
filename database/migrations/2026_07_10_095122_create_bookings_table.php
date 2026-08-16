<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('paket_foto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jadwal_id')->constrained()->cascadeOnDelete();

            $table->string('nama_pelanggan');
            $table->string('email');
            $table->string('no_whatsapp');
            $table->integer('jumlah_orang');

            $table->boolean('bawa_pet')->default(false);

            $table->enum('status_booking',[
                'Menunggu',
                'Dikonfirmasi',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu');

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
