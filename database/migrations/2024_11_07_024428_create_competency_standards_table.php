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
        Schema::create('competency_standards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('unit_code',32);
            $table->string('unit_title', 64);
            $table->text('unit_description');
            $table->integer('grade_level');
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('assessor_id');
            $table->foreign('major_id')->references('id')->on('majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('assessor_id')->references('id')->on('assessors')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_standards');
    }
};
