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
        Schema::create('associers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_affectation');
            $table->foreign('id_affectation')->references('id_affectation')->on('affectations')->onDelete('cascade');
            $table->unsignedBigInteger('id_surveillant');
            $table->foreign('id_surveillant')->references('id_surveillant')->on('surveillants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associers');
    }
};
