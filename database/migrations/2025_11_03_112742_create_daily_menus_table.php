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
        Schema::create('daily_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Ej: "Menú del Día", "Menú Ejecutivo"
            $table->text('description')->nullable(); // Descripción general del menú
            $table->decimal('price', 8, 2); // Precio del menú completo
            $table->date('date')->nullable(); // Fecha específica (opcional)
            $table->json('first_courses'); // Array de primeros platos
            $table->json('second_courses'); // Array de segundos platos  
            $table->json('desserts'); // Array de postres
            $table->json('drinks')->nullable(); // Array de bebidas incluidas (opcional)
            $table->text('notes')->nullable(); // Notas adicionales (ej: "Incluye pan y bebida")
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['restaurant_id', 'date', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_menus');
    }
};
