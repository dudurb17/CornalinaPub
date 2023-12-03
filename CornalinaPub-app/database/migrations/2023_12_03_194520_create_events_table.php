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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->foreignId('empresas_id')->constrained('empresas')->default(null)->onDelete('cascade');
            $table->string("baner", 150,)->nullable();
            $table->date("data");
            $table->string("numero_de_ingressos");
            $table->string("endereco");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};