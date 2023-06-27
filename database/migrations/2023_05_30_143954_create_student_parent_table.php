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
        Schema::create('student_parent', function (Blueprint $table) {
            $table->primary(['student_id']);
            $table->unique(['student_id', 'father_id', 'mother_id']);
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('father_id')->nullable()->constrained();
            $table->foreignId('mother_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parent');
    }
};
