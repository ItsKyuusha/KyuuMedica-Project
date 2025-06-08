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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id(); // id INT UNSIGNED AUTO_INCREMENT
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('no_ktp', 25);
            $table->string('no_hp', 60);
            $table->string('no_rm', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
