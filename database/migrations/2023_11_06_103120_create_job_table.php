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
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('company');
            $table->text('description');
            $table->string('salary');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('experience_id');
            $table->date('deadline');
            $table->string('country');
            $table->string('city');
            $table->string('full_address');
            $table->unsignedBigInteger('user_id');
            $table->integer('applicant_limit');
            $table->integer('applicant_current')->default(0);
            $table->string('status')->default('Pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('category')->noActionOnDelete()->cascadeOnUpdate();
            $table->foreign('experience_id')->references('id')->on('experience')->noActionOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('type_id')->references('id')->on('job_type')->noActionOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
