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
        Schema::create('affectations', function (Blueprint $table) {
            $table->bigIncrements('id_affectation');
            $table->unsignedBigInteger('id_tablette');
            $table->foreign('id_tablette')->references('id_tablette')->on('tablette')->onDelete('cascade');
            $table->unsignedBigInteger('id_local');
            $table->foreign('id_local')->references('id_local')->on('local')->onDelete('cascade');
            $table->date('date_affectation');
            $table->char('demi_journee_affectation',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
