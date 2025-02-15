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
        Schema::create('merhums', function (Blueprint $table) {
            $table->id();
            $table->string('ad_soyad');
            $table->string('dogum_tarihi')->nullable();
            $table->string('olum_tarihi')->nullable();
            $table->string('merhum_gorsel_yolu')->nullable();
            $table->string('mezarlik_gorsel_yolu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merhums');
    }
};
