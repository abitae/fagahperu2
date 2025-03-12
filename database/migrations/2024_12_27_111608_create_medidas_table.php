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
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('alto_total')->nullable();
            $table->string('ancho_total')->nullable();
            $table->string('profundidad_total')->nullable();
            $table->string('alto_espaldar')->nullable();
            $table->string('ancho_espaldar')->nullable();
            $table->string('profundidad_asiento')->nullable();
            $table->string('ancho_asiento')->nullable();
            $table->string('altura_asiento')->nullable();
            $table->string('margen_error')->nullable();
            $table->text('descripcion_general')->nullable();
            $table->text('recomendacion_uso')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};
