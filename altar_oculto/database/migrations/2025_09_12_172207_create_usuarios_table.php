<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->id();

            $table->string('nome');

            $table->string('email')
                  ->unique();

            $table->string('senha');

            // usuário fornecedor opcional
            $table->unsignedBigInteger('fornecedor_id')
                  ->nullable();

            $table->string('imagem')
                  ->nullable();

            $table->timestamps();
            $table->foreign('fornecedor_id')
                  ->references('id')
                  ->on('usuarios')
                  ->nullOnDelete();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }

};