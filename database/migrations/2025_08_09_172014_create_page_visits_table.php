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
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500);
            $table->string('page_title', 255)->nullable();
            $table->string('ip_address', 45);
            $table->string('user_agent', 1000)->nullable();
            $table->string('referer', 500)->nullable();
            $table->string('device_type', 50)->nullable(); // mobile, tablet, desktop
            $table->string('browser', 100)->nullable();
            $table->string('os', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->integer('session_duration')->nullable(); // seconds
            $table->boolean('is_unique_visitor')->default(false);
            $table->string('session_id', 255)->nullable();
            $table->timestamp('visited_at');
            $table->timestamps();
            
            // Índices para optimizar consultas
            $table->index('url');
            $table->index('visited_at');
            $table->index('ip_address');
            $table->index(['url', 'visited_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
