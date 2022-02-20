<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants'; 

    protected $fillable = [
        'name', 
        'status',
        'ano_de_inicio',
        'slug',
        'cnpj',
        'ie',
        'dominio',
        'template',
        //Subscription
        'subscription_id', 'subscription', 'expires_at', 'subscription_active', 'subscription_suspended',
        //Imagens
        'logomarca', 'logomarca_admin', 'logomarca_footer', 'favicon', 'metaimg', 'imgheader', 'marcadagua',
        //SMTP
        'smtp_host', 'smtp_port', 'smtp_user', 'smtp_pass',
        //Contato
        'telefone', 'celular', 'whatsapp', 'skype', 'email', 'email1',
        //Endereço
        'cep', 'rua', 'num', 'complemento', 'bairro', 'uf', 'cidade',
        //Social links
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'linkedin',
        'vimeo',
        'fliccr',
        'soundclound',
        'snapchat',
        //Seo
        'descricao',
        'mapa_google',
        'metatags',
        'rss',
        'rss_data',
        'sitemap',
        'sitemap_data',
        'politicas_de_privacidade'    
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    /**
     * Relacionamentos
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Accerssors and Mutators
    */        
    public function getmetaimg()
    {
        $image = $this->metaimg;        
        if(empty($this->metaimg) || !File::exists('../public/storage/tenants/'. $this->uuid . '/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->metaimg, env('METAIMG_WIDTH'), env('METAIMG_HEIGHT')));
    }
    
    public function getlogomarca()
    {
        $image = $this->logomarca;        
        if(empty($this->logomarca) || !File::exists('../public/storage/tenants/' . $this->uuid . '/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->logomarca, env('LOGOMARCA_WIDTH'), env('LOGOMARCA_HEIGHT')));
    }
    
    public function getlogoadmin()
    {
        $image = $this->logomarca_admin;        
        if(empty($this->logomarca_admin) || !File::exists('../public/storage/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->logomarca_admin, env('LOGOMARCA_GERENCIADOR_WIDTH'), env('LOGOMARCA_GERENCIADOR_HEIGHT')));
    }
    
    public function getfaveicon()
    {
        $image = $this->favicon;        
        if(empty($this->favicon) || !File::exists('../public/storage/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->favicon, env('FAVEICON_WIDTH'), env('FAVEICON_HEIGHT')));
    }
    
    public function getmarcadagua()
    {
        $image = $this->marcadagua;        
        if(empty($this->marcadagua) || !File::exists('../public/storage/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->marcadagua, env('MARCADAGUA_WIDTH'), env('MARCADAGUA_HEIGHT')));
    }
    
    public function gettopodosite()
    {
        $image = $this->imgheader;        
        if(empty($this->imgheader) || !File::exists('../public/storage/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->imgheader, env('IMGHEADER_WIDTH'), env('IMGHEADER_HEIGHT')));
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
    
    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    //Formata o celular para exibir
    public function getWhatsappAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return  
            substr($value, 0, 0) . '(' .
            substr($value, 0, 2) . ') ' .
            substr($value, 2, 5) . '-' .
            substr($value, 7, 4) ;
    }

    
    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
    
    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
