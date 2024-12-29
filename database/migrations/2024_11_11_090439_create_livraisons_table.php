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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('quntite');	
            $table->date('date_l');
            $table->enum('etat', ['disponible', 'non disponible'])->default('disponible') ;// or default('0')
            $table->foreignId('livre_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fournisseur_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
