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
        Schema::create('education_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('locale')->index();
            $table->uuid('education_id');
            $table->string('institution');
            $table->string('department');
            $table->string('description');

            $table->unique(['education_id', 'locale']);
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_translations');
    }
};
