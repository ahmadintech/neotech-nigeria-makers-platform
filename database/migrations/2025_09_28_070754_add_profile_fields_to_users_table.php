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
        Schema::table('users', function (Blueprint $table) {
            $table->string('primary_skill')->nullable(); // Title or main skill
            $table->string('geopolitical_zone')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->nullOnDelete();
            $table->json('skills')->nullable(); // store as JSON array
            $table->boolean('make_email_public')->default(false);
            $table->string('avatar')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('make_phone_public')->default(false);
            $table->text('biography')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('portfolio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'primary_skill',
                'geopolitical_zone',
                'state_id',
                'skills',
                'make_email_public',
                'avatar',
                'phone_number',
                'make_phone_public',
                'biography',
                'linkedin',
                'github',
                'portfolio',
            ]);
        });
    }
};
