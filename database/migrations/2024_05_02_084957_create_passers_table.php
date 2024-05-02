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
        Schema::create('passers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_examen');
            $table->foreign('id_examen')->references('id_examen')->on('examens')->onDelete('cascade');
            $table->unsignedBigInteger('id_local');
            $table->foreign('id_local')->references('id_local')->on('locals')->onDelete('cascade');
            $table->unsignedBigInteger('codeApogee');
            $table->foreign('codeApogee')->references('codeApogee')->on('etudiants')->onDelete('cascade');
            $table->bigInteger('num_exam');
            $table->primary(['id_examen','id_local','codeApogee']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passers');
    }
};
