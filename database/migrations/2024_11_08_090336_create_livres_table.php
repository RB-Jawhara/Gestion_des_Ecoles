<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\LivreEtat;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->float('prix_acht');
            $table->float('prix_vendre');
            $table->integer('quntite');
            $table->date('date');
            $table->enum('value', ['disponible', 'non disponible'])->default('disponible'); // ou autre valeur par défaut
            $table->foreignId('niveau_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
