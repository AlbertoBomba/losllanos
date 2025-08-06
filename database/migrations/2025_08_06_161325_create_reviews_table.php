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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('reviewer_name'); // Nombre del cliente
            $table->string('reviewer_email')->nullable(); // Email opcional
            $table->string('reviewer_location')->nullable(); // Ubicación del cliente
            $table->unsignedTinyInteger('rating'); // Valoración de 1 a 5 estrellas
            $table->string('service_type')->nullable(); // Tipo de servicio (turismo, alojamiento, etc.)
            $table->string('title'); // Título de la reseña
            $table->text('content'); // Contenido de la experiencia
            $table->boolean('is_approved')->default(false); // Aprobación del administrador
            $table->boolean('is_featured')->default(false); // Destacar en home
            $table->string('ip_address')->nullable(); // IP para control
            $table->string('user_agent')->nullable(); // User agent
            $table->integer('spam_score')->default(0); // Para detección de spam
            $table->json('spam_reasons')->nullable(); // Razones de spam
            $table->timestamps();
            
            // Índices para mejor rendimiento
            $table->index(['is_approved', 'is_featured']);
            $table->index(['rating', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
