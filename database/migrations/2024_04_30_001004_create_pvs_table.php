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
        Schema::create('pvs', function (Blueprint $table) {
            $table->bigIncrements('id_pv');
            $table->unsignedBigInteger('id_tablette')->nullable();
            $table->foreign('id_tablette')->references('id_tablette')->on('tablettes')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pvs');
    }
};
