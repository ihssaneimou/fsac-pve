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
        Schema::table('etudiants' ,function (Blueprint $table) {
            $table->unsignedBigInteger('id_rapport')->nullable();
            $table->foreign('id_rapport')->references('id_rapport')->on('rapports')->nullOnDelete();
        });
    
        Schema::table('rapports' ,function (Blueprint $table) {
            $table->unsignedBigInteger('codeApogee');
            $table->foreign('codeApogee')->references('codeApogee')->on('etudiants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
