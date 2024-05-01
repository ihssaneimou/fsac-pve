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
        Schema::create('surveillants', function (Blueprint $table) {
            $table->bigIncrements('id_surveillant');
            $table->unsignedBigInteger('id_departement');
            $table->foreign('id_departement')->references('id_departement')->on('departements')->onDelete('cascade');
            $table->string('nomComplet_s',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveillant');
    }
};
