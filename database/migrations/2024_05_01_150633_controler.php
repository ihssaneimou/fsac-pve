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
        Schema::create('controler', function (Blueprint $table) {
            $table->unsignedBigInteger('id_administrateur');
            $table->foreign('id_administrateur')->references('id_administrateur')->on('administrateurs')->onDelete('cascade');
            $table->unsignedBigInteger('id_tablette');
            $table->foreign('id_tablette')->references('id_tablette')->on('tablettes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controler');
    }
};
