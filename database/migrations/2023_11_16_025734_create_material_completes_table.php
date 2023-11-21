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
        Schema::create('material_completes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subjectmaterial_id')->constrained('subject_materials');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            // $table;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_completes');
    }
};
