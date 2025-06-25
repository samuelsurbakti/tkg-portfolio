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
        Schema::create('skill_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('locale')->index();
            $table->uuid('skill_id');
            $table->string('name');

            $table->unique(['skill_id', 'locale']);
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_translations');
    }
};
