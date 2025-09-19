<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nome')->unique();
        $table->text('descricao')->nullable();
        $table->string('imagem')->nullable();
        $table->string('linha')->nullable();
        $table->string('cores')->nullable();
        $table->string('dia_semana')->nullable();
        $table->text('historia')->nullable();
        $table->text('simbolos')->nullable();
        $table->text('saudacoes')->nullable();
        $table->text('personalidade')->nullable();
        $table->text('animais')->nullable();
        $table->text('elementos')->nullable();
        $table->text('datas_rituais')->nullable();
        $table->text('notas')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
