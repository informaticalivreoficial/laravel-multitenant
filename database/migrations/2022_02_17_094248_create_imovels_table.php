<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('venda')->nullable();
            $table->boolean('locacao')->nullable();
            $table->boolean('destaque')->default('0');
            $table->string('categoria');
            $table->string('tipo');
            $table->integer('status')->default('0');
            $table->unsignedInteger('proprietario');
            $table->unsignedInteger('tenant_id');

            /** pricing and values */
            $table->boolean('exibivalores')->nullable();
            $table->decimal('valor_venda', 10, 2)->nullable();
            $table->decimal('valor_locacao', 10, 2)->nullable();
            $table->decimal('iptu', 10, 2)->nullable();
            $table->decimal('condominio', 10, 2)->nullable();
            
            $table->string('referencia')->nullable();
            
            $table->string('titulo');
            $table->string('slug')->nullable();
            $table->string('headline')->nullable();
            $table->string('experience')->nullable();
            $table->text('metatags')->nullable();
            $table->text('mapadogoogle')->nullable();

            /** description */
            $table->text('descricao')->nullable();            
            $table->text('notasadicionais')->nullable();
            $table->integer('dormitorios')->default('0');
            $table->integer('suites')->nullable();
            $table->integer('banheiros')->nullable();
            $table->integer('salas')->nullable();
            $table->integer('garagem')->nullable();
            $table->integer('garagem_coberta')->nullable();
            $table->string('anodeconstrucao')->nullable();
            $table->integer('area_total')->nullable();
            $table->integer('area_util')->nullable();
            $table->string('medidas')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->string('legendaimgcapa')->nullable();

            /** address */                       
            $table->boolean('exibirendereco')->nullable();            
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('cidade')->nullable();

            /** structure */
            $table->boolean('ar_condicionado')->nullable();
            $table->boolean('areadelazer')->nullable();
            $table->boolean('aquecedor_solar')->nullable();
            $table->boolean('bar')->nullable();
            $table->boolean('banheirosocial')->nullable();
            $table->boolean('brinquedoteca')->nullable();
            $table->boolean('biblioteca')->nullable();
            $table->boolean('balcaoamericano')->nullable();
            $table->boolean('churrasqueira')->nullable();
            $table->boolean('condominiofechado')->nullable();
            $table->boolean('estacionamento')->nullable();
            $table->boolean('cozinha_americana')->nullable();
            $table->boolean('cozinha_planejada')->nullable();
            $table->boolean('dispensa')->nullable();
            $table->boolean('edicula')->nullable();
            $table->boolean('espaco_fitness')->nullable();
            $table->boolean('escritorio')->nullable();
            $table->boolean('banheira')->nullable();
            $table->boolean('geradoreletrico')->nullable();
            $table->boolean('interfone')->nullable();
            $table->boolean('jardim')->nullable();
            $table->boolean('lareira')->nullable();
            $table->boolean('lavabo')->nullable();
            $table->boolean('lavanderia')->nullable();
            $table->boolean('elevador')->nullable();
            $table->boolean('mobiliado')->nullable();
            $table->boolean('vista_para_mar')->nullable();
            $table->boolean('piscina')->nullable();
            $table->boolean('quadrapoliesportiva')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('salaodejogos')->nullable();
            $table->boolean('salaodefestas')->nullable();
            $table->boolean('sistemadealarme')->nullable();
            $table->boolean('saladetv')->nullable();
            $table->boolean('ventilador_teto')->nullable();
            $table->boolean('armarionautico')->nullable();
            $table->boolean('fornodepizza')->nullable();
            $table->boolean('portaria24hs')->nullable();
            $table->boolean('permiteanimais')->nullable();
            $table->boolean('pertodeescolas')->nullable();
            $table->boolean('quintal')->nullable();
            $table->boolean('zeladoria')->nullable();  
            $table->boolean('varandagourmet')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('geladeira')->nullable();
            
            $table->boolean('exibirmarcadagua')->nullable(); 
            $table->text('youtube_video')->nullable(); 
            
            $table->bigInteger('views')->default('0');

            $table->timestamps();
            $table->integer('publication_type')->nullable();

            $table->foreign('proprietario')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
