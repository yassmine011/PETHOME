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
        Schema::create('animaux', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->bigInteger('age');
            $table->date('date_naissance');
            $table->string('sex');
            $table->string('description');
            $table->bigInteger('prix');
            $table->bigInteger('quantite_stock');
            $table->boolean('disponible')->default(true);
            $table->string('photo')->nullable();
            $table->foreignId('categories_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animaux');
    }
};
