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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('avatar')->default('avatars/default_avatar.png');
            $table->string('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('experience_id')->nullable();
            $table->string('education')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->integer('age')->nullable();
            $table->string('language')->nullable();
            $table->text('about')->nullable();
            $table->unsignedBigInteger('role_id')->default(1);
            $table->string('cv')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('full_address')->nullable();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('category')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('experience_id')->references('id')->on('experience')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('type_id')->references('id')->on('job_type')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('role')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
