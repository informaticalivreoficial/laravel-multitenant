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
        $this->tenant = $tenant->tenant();
    }

    public function gerarxml(Request $request)
    {
        $configupdate = $this->tenant;
        $configupdate->sitemap_data = date('Y-m-d');
        $configupdate->sitemap = url('/' . $this->tenant->slug . '_sitemap.xml');
        $configupdate->save();

        Sitemap::create()->add(Url::create('/atendimento')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.1))
            ->add('/')
            ->add('/blog/artigos')
            ->add('/quem-somos')
            ->add('/portifolio')
            ->add('/consultoria/produtos')
            ->add('/consultoria/orcamento')            
            ->writeToFile($this->tenant->slug . '_sitemap.xml'); 
        
        return response()->json(['success' => true]);
    }
}
