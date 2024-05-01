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
        Schema::create('examens', function (Blueprint $table) {
            $table->bigIncrements('id_examen');
            $table->unsignedBigInteger('id_session');
            $table->foreign('id_session')->references('id_session')->on('sessions')->onDelete('cascade');
            $table->unsignedBigInteger('code_module');
            $table->foreign('code_module')->references('code_module')->on('modules')->onDelete('cascade');
            $table->unsignedBigInteger('id_pv');
            $table->foreign('id_pv')->references('id_pv')->on('pvs')->onDelete('cascade');
            $table->date( 'date_examen') ;
            $table->string('demi_journee_examen',10);
            $table->string('seance_examen',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
