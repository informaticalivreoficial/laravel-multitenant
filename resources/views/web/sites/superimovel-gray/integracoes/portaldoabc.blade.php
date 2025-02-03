@if(!empty($portal) && $portal->count() > 0)
<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<informa>
	<language> Portuguese </language>
	<imoveis>
        @if(!empty($pimoveis) && $pimoveis->count() > 0)
            @foreach($pimoveis as $pimovel)
                @if(!empty($imoveis) && $imoveis->count() > 0)
                    @foreach($imoveis as $imovel)
                        @if($imovel->id == $pimovel->imovel)
                        <imovel>
                            <codigoreferencia>{{$imovel->referencia}}</codigoreferencia>
                            <urlimovel>{{url('imovel/'.$imovel->slug)}}</urlimovel>
                            
                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <finalidade>venda</finalidade>
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <finalidade>venda</finalidade>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <finalidade>aluguel</finalidade>
                            @endif
                            
                            <tipoimovel>{{strtolower($imovel->tipo)}}</tipoimovel>
                            <tipoimovellivre>{{$imovel->categoria}}</tipoimovellivre>
                            <statusimovel/>
                            <atualizarimovel/>
                 
                            <titulo>{{$imovel->titulo}}</titulo>
                            <descricao>{{ $imovel->descricao}}</descricao>
                            <dormitorios>{{$imovel->dormitorios}}</dormitorios>  
                            <banheiros>{{$imovel->banheiros}}</banheiros>
                            <suites>{{$imovel->suites }}</suites>
                            <vagas>{{$imovel->garagem + $imovel->garagem_coberta}}</vagas>
                            <area>{{$imovel->area_total}}</area>
                 
                            <endereco/>
                            <cidade>{{getCidade($imovel->cidade, 'cidades')}}</cidade>
                            <bairro>{{ $imovel->bairro }}</bairro>
                            <estado>{{getEstado($imovel->uf, 'estados')}}</estado>
                            <cep>{{$imovel->cep}}</cep>
                            <pais>Brasil</pais>
                 
                            <latitude>##,######</latitude>  
                            <longitude>##,######</longitude>  
                 
                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <preco>{{str_replace("." , "" , str_replace("," , "" , $imovel->valor_venda ) )}}</preco>
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <finalidade>venda</finalidade>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <finalidade>aluguel</finalidade>
                            @endif
                             
                            <data>{{$imovel->created_at}}</data>    
                 
                            <fotos>
                                @if($imovel->images()->get()->count())
                                    @foreach($imovel->images()->get() as $image)
                                        <foto>
                                            <foto_url>{{ $image->getUrlImageAttribute() }}</foto_url>
                                            <foto_descricao>{{ $imovel->titulo }}</foto_descricao>
                                        </foto>                                        
                                    @endforeach
                                @endif
                            </fotos>
                 
                            <anunciante> 
                              <tipoanunciante>imobiliaria</tipoanunciante>     
                              <nomefantasia>{{ $Configuracoes->nomedosite }}</nomefantasia>
                              <endereco>{{$Configuracoes->rua}}</endereco>
                              <bairro>{{$Configuracoes->bairro}}</bairro>
                              <cidade>{{getCidade($configuracoes->cidade, 'cidades')}}</cidade>
                              <estado>{{getEstado($configuracoes->uf, 'estados')}}</estado>
                              <telefone>{{ $Configuracoes->telefone1 }}</telefone>
                              <email>{{ $Configuracoes->email }}</email>
                              <novoemail>{{ $Configuracoes->email1 }}</novoemail>
                              <urlsite>{{route('web.home')}}</urlsite>
                              <urllogo>{{$configuracoes->getlogomarca()}}</urllogo>   
                            </anunciante>         
                          </imovel>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
	</imoveis>
</informa>
@endif