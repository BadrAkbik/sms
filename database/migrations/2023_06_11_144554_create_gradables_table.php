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
        Schema::create('gradables', function (Blueprint $table) {
            $table->primary(['gradable_id', 'grade_id', 'gradable_type']);
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('gradable_id');
            $table->string('gradable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradables');
    }
};
