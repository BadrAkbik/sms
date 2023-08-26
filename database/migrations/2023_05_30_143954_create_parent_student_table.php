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
        Schema::create('parent_student', function (Blueprint $table) {
            $table->primary(['parent_student_id', 'student_id', 'parent_student_type']);
            $table->unique(['student_id', 'parent_student_type']);
            $table->foreignId('student_id')->constrained();
            $table->foreignId('parent_student_id');
            $table->string('parent_student_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_student');
    }
};
