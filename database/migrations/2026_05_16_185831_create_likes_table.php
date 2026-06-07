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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

            // Crea la colonna user_id e la collega alla tabella users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Crea la colonna post_id e la collega alla tabella posts
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            $table->timestamps();

            // Questo indice UNIQUE assicura che un utente NON possa mettere 
            // più di un like allo stesso identico post
            $table->unique(['user_id', 'post_id']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
