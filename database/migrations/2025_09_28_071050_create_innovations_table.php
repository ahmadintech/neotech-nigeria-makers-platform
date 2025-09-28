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
        Schema::create('innovations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // owner of innovation
            $table->string('title');
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->string('status')->default('draft');//'draft', 'submitted', 'approved', 'rejected'
            $table->text('description')->nullable();
            $table->string('funding_status')->default('unfunded'); //'unfunded', 'seeking', 'funded'
            $table->json('images')->nullable(); // store image paths
            $table->json('team_members')->nullable(); // store user ids as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovations');
    }
};
