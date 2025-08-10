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
        Schema::create('keyword_rankings', function (Blueprint $table) {
            $table->id();
            $table->string('keyword'); // La palabra clave
            $table->string('url'); // URL de la página
            $table->string('page_title')->nullable(); // Título de la página
            $table->integer('position')->nullable(); // Posición en Google (1-100+)
            $table->string('search_engine')->default('google'); // Motor de búsqueda
            $table->string('country')->default('es'); // País (.es, .com, etc.)
            $table->date('check_date'); // Fecha de la verificación
            $table->decimal('click_through_rate', 5, 2)->nullable(); // CTR si está disponible
            $table->integer('impressions')->nullable(); // Impresiones
            $table->integer('clicks')->nullable(); // Clics
            $table->decimal('average_position', 5, 2)->nullable(); // Posición promedio más precisa
            $table->json('metadata')->nullable(); // Datos adicionales
            $table->timestamps();
            
            // Índices para optimizar consultas
            $table->index(['keyword', 'check_date']);
            $table->index(['url', 'check_date']);
            $table->index(['position', 'check_date']);
            
            // Índice único con longitud limitada para evitar errores MySQL
            $table->index(['keyword', 'url', 'search_engine', 'check_date'], 'idx_keyword_url_engine_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyword_rankings');
    }
};
