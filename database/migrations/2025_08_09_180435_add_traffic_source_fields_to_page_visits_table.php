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
        Schema::table('page_visits', function (Blueprint $table) {
            $table->string('traffic_source', 100)->nullable()->after('referer');
            $table->string('traffic_medium', 100)->nullable()->after('traffic_source');
            $table->string('search_engine', 100)->nullable()->after('traffic_medium');
            $table->string('search_keywords', 255)->nullable()->after('search_engine');
            $table->string('utm_source', 100)->nullable()->after('search_keywords');
            $table->string('utm_medium', 100)->nullable()->after('utm_source');
            $table->string('utm_campaign', 255)->nullable()->after('utm_medium');
            
            // Añadir índices para optimizar consultas
            $table->index('traffic_source');
            $table->index('search_engine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_visits', function (Blueprint $table) {
            $table->dropIndex(['traffic_source']);
            $table->dropIndex(['search_engine']);
            
            $table->dropColumn([
                'traffic_source',
                'traffic_medium', 
                'search_engine',
                'search_keywords',
                'utm_source',
                'utm_medium',
                'utm_campaign'
            ]);
        });
    }
};
