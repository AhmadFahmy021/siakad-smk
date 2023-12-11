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
        Schema::create('subject_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('classroom_id')->constrained('classrooms');
            $table->foreignId('subjectmaterial_id')->constrained('subject_materials');
            $table->integer('nilai_skill')->nullable();
            $table->integer('nilai_test')->nullable();
            $table->integer('nilai_attitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_grades');
    }
};
