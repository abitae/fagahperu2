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
        Schema::create('action_negocios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('negocio_id')->constrained('negocios');   
            $table->foreignId('contact_id')->constrained('contacts');     
            $table->string('tipo');
            $table->text('description');
            $table->dateTime('date')->nullable();
            $table->string('image')->nullable();
            $table->string('archivo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_negocios');
    }
};
