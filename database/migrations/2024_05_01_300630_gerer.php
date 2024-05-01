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
        Schema::create('gerers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administrateur');
            $table->foreign('id_administrateur')->references('id_administrateur')->on('administrateurs')->onDelete('cascade');
            $table->unsignedBigInteger('id_session');
            $table->foreign('id_session')->references('id_session')->on('sessions')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerers');
    }
};