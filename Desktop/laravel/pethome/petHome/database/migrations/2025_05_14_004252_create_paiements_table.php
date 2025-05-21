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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('montant');
            $table->date('date_paiement');
           $table->enum('mode_paiement', ['carte', 'paypal', 'virement', 'especes']);
            $table->enum('statut', ['en_attente', 'complete', 'echoue', 'rembourse']);
            $table->foreignId('commandes_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
