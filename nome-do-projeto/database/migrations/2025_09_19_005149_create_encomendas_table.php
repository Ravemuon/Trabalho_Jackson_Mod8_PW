<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabela de encomendas (dados do cliente/pedido)
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->string('email_cliente');
            $table->string('telefone_cliente')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });

        // Tabela de itens da encomenda
        Schema::create('encomenda_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encomenda_id')
                  ->constrained('encomendas')
                  ->onDelete('cascade');
            $table->foreignId('produto_id')
                  ->constrained('produtos')
                  ->onDelete('cascade');
            $table->integer('quantidade')->default(1);
            $table->decimal('preco_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encomenda_itens');
        Schema::dropIfExists('encomendas');
    }
};
