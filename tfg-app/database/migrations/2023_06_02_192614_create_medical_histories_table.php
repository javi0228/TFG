<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('emergency_phone');
            $table->string('allergies');
            $table->string('other_diseases');
            $table->boolean('diabetes')->default(false)->nullable();
            $table->boolean('cancer')->default(false)->nullable();
            $table->boolean('overweight')->default(false)->nullable();
            $table->boolean('epilepsy')->default(false)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};