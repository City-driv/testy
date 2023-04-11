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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->enum('genre',['male','femelle']);
            $table->enum('hebergement',['proprietaire','locataire']);
            $table->boolean('situation_familiale');
            $table->string('adresse');
            $table->string('ville');
            $table->string('departement');
            $table->float('montant_facture');
            $table->float('reste_a_vivre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
