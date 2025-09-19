<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('descricao');
            $table->decimal('preco', 8, 2);
            $table->string('imagem')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->timestamps();
            $table->integer('estoque')->default(0);
            $table->string('codigo')->nullable();
            $table->decimal('peso', 8, 2)->nullable();
            $table->string('dimensoes')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('popular')->default(false);
            $table->boolean('ativo')->default(true);
            $table->text('observacoes')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
