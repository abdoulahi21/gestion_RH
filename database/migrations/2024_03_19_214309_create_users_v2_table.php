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
        Schema::table('users', function (Blueprint $table) {
           $table->string('adresse')->nullable();
           $table->string('telephone')->nullable();
           $table->string('date_naissance')->nullable();
           $table->string('lieu_naissance')->nullable();
           $table->string('sexe')->nullable();
           $table->string('situation_matrimoniale')->nullable();
           $table->string('nombre_enfants')->nullable();
           $table->string('nationalite')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
