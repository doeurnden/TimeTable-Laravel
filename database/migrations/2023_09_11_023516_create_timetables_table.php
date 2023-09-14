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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->integer('academic_year_id');
            $table->integer('department_id');
            $table->integer('degree_id');
            $table->integer('grade_id');
            $table->integer('option_id')->nullable();
            $table->integer('semester_id');
            $table->integer('week_id');
            $table->integer('group_id')->nullable();
            $table->boolean('completed')->default(false);
            $table->integer('created_uid');
            $table->integer('updated_uid');
            $table->timestamps(0); // Create 'created_at' and 'updated_at' columns as timestamp(0) without time zone

            // Define foreign key constraints
            $table->foreign('academic_year_id')->references('id')->on('academicYears')->onDelete('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('departmentOptions')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
