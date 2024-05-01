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
        Schema::create('signers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_surveillant');
            $table->foreign('id_surveillant')->references('id_surveillant')->on('surveillants')->onDelete('cascade');
            $table->unsignedBigInteger('id_pv');
            $table->foreign('id_pv')->references('id_pv')->on('pvs')->onDelete('cascade');
            $table->string('signature',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signers');
    }
};
