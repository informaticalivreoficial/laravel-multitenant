<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('plan_id'); // Plano ID 
            $table->uuid('uuid');            
            $table->string('name')->unique();
            $table->string('social_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('ano_de_inicio')->nullable();            
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->string('dominio')->nullable();
            $table->string('subdominio')->nullable();
            $table->string('template')->nullable();
            $table->string('template_exclusivo')->nullable();

            /** subscription */
            $table->string('subscription_id')->nullable(); // gatway id
            $table->date('subscription')->nullable(); // Data de inicio 
            $table->date('expires_at')->nullable(); // Data de Expiração            
            $table->boolean('subscription_active')->default(false); // Assinatura Ativa 
            $table->boolean('subscription_suspended')->default(false); // Assinatura Cancelada 
            

            /** imagens */
            $table->string('logomarca')->nullable();
            $table->string('logomarca_admin')->nullable();
            $table->string('logomarca_footer')->nullable();
            $table->string('favicon')->nullable();
            $table->string('metaimg')->nullable();
            $table->string('imgheader')->nullable();
            $table->string('marcadagua')->nullable();
            
            /** smtp */
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_pass')->nullable();
            
            /** contact */
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('email')->nullable();
            $table->string('email1')->nullable();
            
            /** address */
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('cidade')->nullable();
            
            /** redes sociais */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('fliccr')->nullable();
            $table->string('soundclound')->nullable();
            $table->string('snapchat')->nullable(); 
            
            /** seo */
            $table->text('descricao')->nullable();
            $table->text('notasadicionais')->nullable();
            $table->text('politicas_de_privacidade')->nullable();
            $table->text('mapa_google')->nullable();
            $table->text('metatags')->nullable();
            $table->string('analytics_view')->nullable();
            $table->string('tagmanager_id')->nullable();
            $table->string('rss')->nullable();            
            $table->date('rss_data')->nullable();
            $table->string('sitemap')->nullable();
            $table->date('sitemap_data')->nullable();

            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
