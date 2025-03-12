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
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('estructura')->nullable();
            $table->string('base_del_asiento')->nullable();
            $table->string('relleno_del_asiento')->nullable();
            $table->string('acabado_del_asiento')->nullable();
            $table->string('espaldar')->nullable();
            $table->string('relleno_del_espaldar')->nullable();
            $table->string('acabado_del_espaldar')->nullable();
            $table->string('reposa_brazos')->nullable();
            $table->string('cantidad_de_patas')->nullable();
            $table->string('soporte_peso_máximo')->nullable();
            $table->string('garantía_de_fabrica')->nullable();
            $table->string('unidad_de_despacho')->nullable();
            $table->string('gama_de_color')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('codigo_de_identificacion_unico')->nullable();
            $table->string('empaque_de_fabrica')->nullable();
            $table->string('certificado_de_ergonomía')->nullable();
            $table->string('entrega_del_producto_armado')->nullable();
            $table->string('soporte_del_asiento')->nullable();
            $table->string('material_patas')->nullable();
            $table->string('apilable')->nullable();
            $table->string('relleno_reposa_brazos')->nullable();
            $table->string('material_del_piston')->nullable();
            $table->string('material_de_la_funda_del_piston')->nullable();
            $table->string('tipo_de_mecanismo_del_asiento')->nullable();
            $table->string('material_del_mecanismo_del_asiento')->nullable();
            $table->string('soporte_lumbar')->nullable();
            $table->string('reposacabeza')->nullable();
            $table->string('número_de_aspas')->nullable();
            $table->string('material_del_aspa')->nullable();
            $table->string('material_de_las_ruedas')->nullable();
            $table->string('tapizado_del_asiento')->nullable();
            $table->string('cubierta_del_espaldar')->nullable();
            $table->string('tapizado_del_espaldar')->nullable();
            $table->string('mecanismo_del_espaldar')->nullable();
            $table->string('tablero')->nullable();
            $table->string('platina_de_anclaje')->nullable();
            $table->string('tapizado_asiento')->nullable();
            $table->string('cantidad_de_cuerpos')->nullable();
            $table->string('contacto_superficie')->nullable();
            $table->string('cod_de_identif_unico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristicas');
    }
};
