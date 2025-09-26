<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // CRIA TABELAS ENCOMENDAS E ITENS
    public function up(): void
    {
        // Tabela de encomendas (dados do cliente/pedido)
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id(); // id da encomenda
            $table->string('nome_cliente'); // nome do cliente
            $table->string('email_cliente'); // email do cliente
            $table->string('telefone_cliente')->nullable(); // telefone opcional
            $table->decimal('total', 10, 2)->nullable(); // total do pedido
            $table->text('observacoes')->nullable(); // observações adicionais
            $table->timestamps(); // created_at e updated_at
        });

        // Tabela de itens da encomenda
        Schema::create('encomenda_itens', function (Blueprint $table) {
            $table->id(); // id do item
            $table->foreignId('encomenda_id')
                  ->constrained('encomendas')
                  ->onDelete('cascade'); // link para encomenda
            $table->foreignId('produto_id')
                  ->constrained('produtos')
                  ->onDelete('cascade'); // link para produto
            $table->integer('quantidade')->default(1); // quantidade do item
            $table->decimal('preco_unitario', 10, 2); // preço unitário
            $table->decimal('subtotal', 10, 2); // subtotal do item
            $table->timestamps(); // created_at e updated_at
        });
    }

    // REMOVE TABELAS ENCOMENDAS E ITENS
    public function down(): void
    {
        Schema::dropIfExists('encomenda_itens');
        Schema::dropIfExists('encomendas');
    }
};
