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
        Schema::create('profession_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('locale')->index();
            $table->uuid('profession_id');
            $table->string('name');

            $table->unique(['profession_id', 'locale']);
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profession_translations');
    }
};
