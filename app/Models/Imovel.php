<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Support\Cropper;
use App\Tenant\Traits\TenantTrait;

class Imovel extends Model
{
    use HasFactory, TenantTrait;

    protected $table = 'imoveis'; 
    
    protected $fillable = [
        'venda',
        'locacao',
        'categoria',
        'tipo',
        'proprietario',
        'exibivalores',
        'valor_venda',
        'valor_locacao',
        'iptu',
        'ano_construcao',
        'referencia',
        'condominio',
        'descricao',
        'notasadicionais',
        'dormitorios',
        'suites',
        'banheiros',
        'salas',
        'garagem',
        'garagem_coberta',
        'anodeconstrucao',
        'area_total',
        'area_util',
        'medidas',
        'latitude',
        'longitude',
        'exibirendereco',
        'cep',
        'rua',
        'num',
        'complemento',
        'bairro',
        'uf',
        'cidade',
        //ACESSORIOS
        'ar_condicionado', 'aquecedor_solar', 'bar', 'biblioteca', 'churrasqueira', 'estacionamento',
        'cozinha_americana', 'cozinha_planejada', 'dispensa', 'edicula', 'espaco_fitness',
        'escritorio', 'fornodepizza', 'armarionautico', 'portaria24hs', 'quintal', 'zeladoria',
        'salaodejogos', 'saladetv', 'areadelazer', 'balcaoamericano', 'varandagourmet',
        'banheirosocial', 'brinquedoteca', 'pertodeescolas', 'condominiofechado',
        'interfone', 'sistemadealarme', 'jardim', 'salaodefestas', 'permiteanimais',
        'quadrapoliesportiva', 'geradoreletrico', 'banheira', 'lareira', 'lavabo', 'lavanderia',
        'elevador', 'mobiliado', 'vista_para_mar', 'piscina', 'sauna', 'ventilador_teto',
        'internet', 'geladeira',
        //SEO
        'titulo', 'slug', 'status', 'views', 'metatags', 'headline',
        'exibirmarcadagua',
        'youtube_video',
        'legendaimgcapa',
        'mapadogoogle',
        'experience',
        'destaque',
        'publication_type'
    ];
    
    /**
     * Scopes
     */

    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    public function scopeVenda($query)
    {
        return $query->where('venda', 1);
    }

    public function scopeLocacao($query)
    {
        return $query->where('locacao', 1);
    }
    
    /**
     * Relacionamentos
    */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'proprietario', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImovelGb::class, 'imovel', 'id')->orderBy('cover', 'ASC');
    }
    
    public function countimages()
    {
        return $this->hasMany(ImovelGb::class, 'imovel', 'id')->count();
    }

    public function imagesmarcadagua()
    {
        return $this->hasMany(ImovelGb::class, 'imovel', 'id')->whereNull('marcadagua')->count();
    }

    public function pimoveis()
    {
        return $this->hasMany(PortalImoveis::class, 'imovel', 'id');
    }
    
    /**
     * Accerssors and Mutators
     */
    public function getContentWebAttribute()
    {
        return Str::words($this->descricao, '20', ' ...');
    }

    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if(!$cover) {
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if(empty($cover['path']) || !Storage::disk()->exists($cover['path'])) {
            return url(asset('backend/assets/images/image.jpg'));
        }

        return Storage::url($cover['path']);
    }

    public function coverSlideGallery()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if(!$cover) {
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if(empty($cover['path']) || !Storage::disk()->exists($cover['path'])) {
            return url(asset('backend/assets/images/image.jpg'));
        }

        return Storage::url($cover['path']);
    }

    public function nocover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if(!$cover) {
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if(empty($cover['path']) || !Storage::disk()->exists($cover['path'])) {
            return url(asset('backend/assets/images/realty.jpeg'));
        }

        return Storage::url($cover['path']);
    }

    public function setExibirenderecoAttribute($value)
    {
        $this->attributes['exibirendereco'] = ($value == true || $value == '1' ? 1 : 0);
    }

    public function setExibirvaloresAttribute($value)
    {
        $this->attributes['exibivalores'] = ($value == true || $value == '1' ? 1 : 0);
    }

    public function setExibirmarcadaguaAttribute($value)
    {
        $this->attributes['exibirmarcadagua'] = ($value == true || $value == '1' ? 1 : 0);
    }
    
    public function setVendaAttribute($value)
    {
        $this->attributes['venda'] = ($value == true || $value == 'on' ? 1 : 0);
    }

    public function setLocacaoAttribute($value)
    {
        $this->attributes['locacao'] = ($value == true || $value == 'on' ? 1 : 0);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }

    public function setValorVendaAttribute($value)
    {
        $this->attributes['valor_venda'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorVendaAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }
    
    public function setValorLocacaoAttribute($value)
    {
        $this->attributes['valor_locacao'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorLocacaoAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }
    
    public function setIptuAttribute($value)
    {
        $this->attributes['iptu'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getIptuAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }
    
    public function setCondominioAttribute($value)
    {
        $this->attributes['condominio'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getCondominioAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }
    
    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getCepAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    }
    
    /**
     * Mutator Air Conditioning
     *
     * @param $value
     */
    public function setArCondicionadoAttribute($value)
    {
        $this->attributes['ar_condicionado'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Air Conditioning
     *
     * @param $value
     */
    public function setAquecedorsolarAttribute($value)
    {
        $this->attributes['aquecedor_solar'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Air Conditioning
     *
     * @param $value
     */
    public function setBarAttribute($value)
    {
        $this->attributes['bar'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Air Conditioning
     *
     * @param $value
     */
    public function setBibliotecaAttribute($value)
    {
        $this->attributes['biblioteca'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Air Conditioning
     *
     * @param $value
     */
    public function setChurrasqueiraAttribute($value)
    {
        $this->attributes['churrasqueira'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Estacionamento
     *
     * @param $value
     */
    public function setEstacionamentoAttribute($value)
    {
        $this->attributes['estacionamento'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Espaço Fitness
     *
     * @param $value
     */
    public function setEspacofitnessAttribute($value)
    {
        $this->attributes['espaco_fitness'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Forno de Pizza
     *
     * @param $value
     */
    public function setFornodepizzaAttribute($value)
    {
        $this->attributes['fornodepizza'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Portaria 24hs
     *
     * @param $value
     */
    public function setPortaria24hsAttribute($value)
    {
        $this->attributes['portaria24hs'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Armário Náutico
     *
     * @param $value
     */
    public function setArmarionauticoAttribute($value)
    {
        $this->attributes['armarionautico'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quintal
     *
     * @param $value
     */
    public function setQuintalAttribute($value)
    {
        $this->attributes['quintal'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Zeladoria
     *
     * @param $value
     */
    public function setZeladoriaAttribute($value)
    {
        $this->attributes['zeladoria'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Salão de Jogos
     *
     * @param $value
     */
    public function setSalaodejogosAttribute($value)
    {
        $this->attributes['salaodejogos'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sala de TV
     *
     * @param $value
     */
    public function setSaladetvAttribute($value)
    {
        $this->attributes['saladetv'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Área de Lazer
     *
     * @param $value
     */
    public function setAreadelazerAttribute($value)
    {
        $this->attributes['areadelazer'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Balcão Americano
     *
     * @param $value
     */
    public function setBalcaoamericanoAttribute($value)
    {
        $this->attributes['balcaoamericano'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Varanda Gourmet
     *
     * @param $value
     */
    public function setVarandagourmetAttribute($value)
    {
        $this->attributes['varandagourmet'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Banheiro Social
     *
     * @param $value
     */
    public function setBanheirosocialAttribute($value)
    {
        $this->attributes['banheirosocial'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Brinquedoteca
     *
     * @param $value
     */
    public function setBrinquedotecaAttribute($value)
    {
        $this->attributes['brinquedoteca'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Perto de Escolas
     *
     * @param $value
     */
    public function setPertodeescolasAttribute($value)
    {
        $this->attributes['pertodeescolas'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Condomínio fechado
     *
     * @param $value
     */
    public function setCondominiofechadoAttribute($value)
    {
        $this->attributes['condominiofechado'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Interfone
     *
     * @param $value
     */
    public function setInterfoneAttribute($value)
    {
        $this->attributes['interfone'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sistema de alarme
     *
     * @param $value
     */
    public function setSistemadealarmeAttribute($value)
    {
        $this->attributes['sistemadealarme'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Jardim
     *
     * @param $value
     */
    public function setJardimAttribute($value)
    {
        $this->attributes['jardim'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Salão de Festas
     *
     * @param $value
     */
    public function setSalaodefestasAttribute($value)
    {
        $this->attributes['salaodefestas'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Permite animais
     *
     * @param $value
     */
    public function setPermiteanimaisAttribute($value)
    {
        $this->attributes['permiteanimais'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quadra poliesportiva
     *
     * @param $value
     */
    public function setQuadrapoliesportivaAttribute($value)
    {
        $this->attributes['quadrapoliesportiva'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Gerador elétrico
     *
     * @param $value
     */
    public function setGeradoreletricoAttribute($value)
    {
        $this->attributes['geradoreletrico'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Cozinha Americana
     *
     * @param $value
     */
    public function setCozinhaAmericanaAttribute($value)
    {
        $this->attributes['cozinha_americana'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    /**
     * Mutator Cozinha Planejada
     *
     * @param $value
     */
    public function setCozinhaPlanejadaAttribute($value)
    {
        $this->attributes['cozinha_planejada'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Bar Social
     *
     * @param $value
     */
    public function setDispensaAttribute($value)
    {
        $this->attributes['dispensa'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Edícula
     *
     * @param $value
     */
    public function setEdiculaAttribute($value)
    {
        $this->attributes['edicula'] = (($value === true || $value === 'on') ? 1 : 0);
    }    

    /**
     * Mutator Escritório
     *
     * @param $value
     */
    public function setEscritorioAttribute($value)
    {
        $this->attributes['escritorio'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Banheira
     *
     * @param $value
     */
    public function setBanheiraAttribute($value)
    {
        $this->attributes['banheira'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Lareira
     *
     * @param $value
     */
    public function setLareiraAttribute($value)
    {
        $this->attributes['lareira'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Lavabo
     *
     * @param $value
     */
    public function setLavaboAttribute($value)
    {
        $this->attributes['lavabo'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Lavanderia
     *
     * @param $value
     */
    public function setLavanderiaAttribute($value)
    {
        $this->attributes['lavanderia'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Elevador
     *
     * @param $value
     */
    public function setElevadorAttribute($value)
    {
        $this->attributes['elevador'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Mobiliado
     *
     * @param $value
     */
    public function setMobiliadoAttribute($value)
    {
        $this->attributes['mobiliado'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Vista para o Mar
     *
     * @param $value
     */
    public function setVistaParaMarAttribute($value)
    {
        $this->attributes['vista_para_mar'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Piscina
     *
     * @param $value
     */
    public function setPiscinaAttribute($value)
    {
        $this->attributes['piscina'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sauna
     *
     * @param $value
     */
    public function setSaunaAttribute($value)
    {
        $this->attributes['sauna'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Ventilador de Teto
     *
     * @param $value
     */
    public function setVentiladorTetoAttribute($value)
    {
        $this->attributes['ventilador_teto'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Internet
     *
     * @param $value
     */
    public function setInternetAttribute($value)
    {
        $this->attributes['internet'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Geladeira
     *
     * @param $value
     */
    public function setGeladeiraAttribute($value)
    {
        $this->attributes['geladeira'] = (($value === true || $value === 'on') ? 1 : 0);
    }
    
    public function setSlug()
    {
        if(!empty($this->titulo)){
            $post = Imovel::where('titulo', $this->titulo)->first(); 
            if(!empty($post) && $post->id != $this->id){
                $this->attributes['slug'] = Str::slug($this->titulo) . '-' . $this->id;
            }else{
                $this->attributes['slug'] = Str::slug($this->titulo);
            }            
            $this->save();
        }
    }

    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(',', '.', str_replace('.', '', $param));
    }

    private function clearField(?string $param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
