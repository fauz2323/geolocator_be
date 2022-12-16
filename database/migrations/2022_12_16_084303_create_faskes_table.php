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
        Schema::create('faskes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_kategori')->constrained('kategori_faskes');
            $table->foreignId('kode_user')->constrained('users');
            $table->string('nama_faskes');
            $table->string('kode_faskes')->unique();
            $table->text('alamat');
            $table->string('telpon');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('verifikasi');
            $table->string('gambar');
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
        Schema::dropIfExists('faskes');
    }
};
