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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('date_commandea');
            $table->enum('statut', ['en_attente', 'confirmee', 'expediee', 'livree', 'annulee','en cours'
]);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('animaux_id')->constrained('animaux');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};

