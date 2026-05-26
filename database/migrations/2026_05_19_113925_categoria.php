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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();               // ID ÚNICO (PRIMARY KEY)
            $table->string('name');     // NOME DA CATEGORIA (TEXTO)
            $table->timestamps();       // CREATED_AT e UPDATED_AT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
