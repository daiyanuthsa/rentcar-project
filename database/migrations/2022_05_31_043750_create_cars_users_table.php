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
        Schema::create('cars_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('peminjaman');
            $table->date('pengembalian');
            $table->bigInteger('harga');
            $table->boolean('konfirmasi')->default(false);
            $table->string('foto_bukti')->default("empty");
            $table->boolean('lunas')->default(false);
            $table->boolean('selesai')->default(false);
            $table->boolean('batal')->default(false);
            $table->foreignId('car_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_users');
    }
};
