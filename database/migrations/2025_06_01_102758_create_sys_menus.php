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
        Schema::create('sys_menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('icon');
            $table->string('url');
            $table->string('source');
            $table->integer('order_number');
            $table->uuid('parent')->nullable();
            $table->string('member_of')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_menus');
    }
};
