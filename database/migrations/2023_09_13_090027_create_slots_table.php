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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->integer('time_tp')->default(0);
            $table->integer('time_td')->default(0);
            $table->integer('time_course')->default(0);
            $table->integer('academic_year_id');
            $table->integer('course_program_id');
            $table->integer('semester_id');
            $table->integer('lecturer_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->double('time_used')->nullable();
            $table->double('time_remaining')->nullable();
            $table->integer('created_uid');
            $table->integer('write_uid')->nullable();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
