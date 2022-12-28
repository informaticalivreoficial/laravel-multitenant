<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tenant\ManangerTenant;
use Illuminate\Http\Request;

use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    protected $tenant;

    public function __construct(ManangerTenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function gerarxml(Request $request)
    {
        $configupdate = $this->tenant->tenant();
        $configupdate->sitemap_data = date('Y-m-d');
        $configupdate->sitemap = url('/' . $configupdate->slug . '_sitemap.xml');
        $configupdate->save();

        if($this->tenant->isDomainMain() == true){
            Sitemap::create()->add(Url::create('/atendimento')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.1))
            ->add('/')
            ->add('/blog/artigos')
            ->add('/noticias')
            ->add('/quem-somos')
            ->add('/planos')           
            ->writeToFile($configupdate->slug . '_sitemap.xml');
        }else{
            Sitemap::create()->add(Url::create('/atendimento')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.1))
            ->add('/')
            ->add('/blog/artigos')
            ->add('/noticias')
            ->add('/quem-somos')
            ->add('/imoveis/venda')
            ->add('/imoveis/locacao')            
            ->add('/pesquisar-imoveis')            
            ->add('/politica-de-privacidade')            
            ->writeToFile($configupdate->slug . '_sitemap.xml');
        }

         
        
        return response()->json(['success' => true]);
    }
}
