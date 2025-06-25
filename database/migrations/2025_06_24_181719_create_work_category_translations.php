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
        Schema::create('work_category_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('locale')->index();
            $table->uuid('wc_id');
            $table->string('name');

            $table->unique(['wc_id', 'locale']);
            $table->foreign('wc_id')->references('id')->on('work_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_category_translations');
    }
};
