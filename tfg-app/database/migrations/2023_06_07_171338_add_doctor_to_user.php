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
        Schema::table('users', function (Blueprint $table) {
            // Añado la columna doctor porque se crea antes la tabla usuarios que doctores
            // La añado justo después de la columna Id
            $table->after('id',function ($table){

                $table->foreignId('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
