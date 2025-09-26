<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // CRIA TABELA ENCOMENDA_ITENS
    public function up(): void
    {
        Schema::create('encomenda_itens', function (Blueprint $table) {
            $table->id(); // id do item
            $table->foreignId('encomenda_id')->constrained('encomendas')->onDelete('cascade'); // link para encomenda
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade'); // link para produto
            $table->integer('quantidade')->default(1); // quantidade do produto
            $table->decimal('preco_unitario', 10, 2); // preço unitário
            $table->decimal('subtotal', 10, 2); // subtotal do item
            $table->timestamps(); // created_at e updated_at
        });
    }

    // REMOVE TABELA ENCOMENDA_ITENS
    public function down(): void
    {
        Schema::dropIfExists('encomenda_itens');
    }
};
