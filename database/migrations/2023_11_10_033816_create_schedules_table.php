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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId("subject_id")->constrained("subjects");
            $table->time("time_start");
            $table->time("time_end");
            $table->string("room");
            $table->text("information")->nullable();
            $table->foreignId("teacher_id")->constrained("teachers");
            $table->foreignId("classroom_id")->constrained("classrooms");
            $table->string("code")->nullable();
            // $table;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
