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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            
            // Dados pessoais do cadastro
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->integer('numero_quartos')->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->enum('periodo_locacao', ['TEMPORADA', 'ANUAL']);
            
            // Conformidade LGPD (Lei 13.709/2018)
            $table->boolean('aceite_termos')->default(false)->comment('Aceite dos Termos de Uso e Política de Privacidade');
            $table->timestamp('data_aceite_termos')->nullable()->comment('Data e hora exata do aceite');
            $table->string('ip_cadastro')->nullable()->comment('IP do usuário no momento do cadastro (auditoria)');
            $table->string('user_agent', 500)->nullable()->comment('Navegador/dispositivo utilizado (auditoria)');
            
            // Timestamps
            $table->timestamp('data_cadastro')->useCurrent()->comment('Data e hora do cadastro');
            $table->timestamps();
            
            // Índices para performance
            $table->index('cpf');
            $table->index('cidade');
            $table->index('data_cadastro');
            $table->index('aceite_termos');
            $table->index('data_aceite_termos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
