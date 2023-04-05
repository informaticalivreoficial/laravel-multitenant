@if(!empty($portal) && $portal->count() > 0)
<?=
'<?xml version="1.0" encoding="iso-8859-1"?>' .PHP_EOL
?>
<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<Imoveis>
        @if(!empty($pimoveis) && $pimoveis->count() > 0)
            @foreach($pimoveis as $pimovel)
                @if(!empty($imoveis) && $imoveis->count() > 0)
                    @foreach($imoveis as $imovel)
                        @if($imovel->id == $pimovel->imovel)
                        <Imovel>
                            <CodigoCentralVendas>{{$portal->codigo}}</CodigoCentralVendas>
                            <CodigoImovel>{{$imovel->referencia}}</CodigoImovel>
                            @if ($imovel->tipo == 'Casa')
                                <TipoImovel>Casa</TipoImovel>
                            @elseif($imovel->tipo == 'Apartamento')
                                <TipoImovel>Apartamento</TipoImovel>
                            @elseif($imovel->tipo == 'Terreno')
                                <TipoImovel>Terreno</TipoImovel>
                            @else
                                <TipoImovel>Comercial</TipoImovel>
                            @endif
                            
                            <SubTipoImovel>Padrão</SubTipoImovel>
                            {{--<CategoriaImovel></CategoriaImovel>--}}
                            <TituloImovel><![CDATA[ {{$imovel->titulo}} ]]></TituloImovel>
                            <Observacao><![CDATA[ {{ strip_tags($imovel->descricao)}} ]]></Observacao>

                            <Modelo>{{($imovel->publication_type == '0' ? 'Simples' : 
                                ($imovel->publication_type == '1' ? 'Destaque' : 
                                ($imovel->publication_type == '2' ? 'Super Destaque' : 'Simples')))}}</Modelo>
                            
                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <finalidade>venda</finalidade>
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <finalidade>venda</finalidade>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <finalidade>aluguel</finalidade>
                            @endif                            
                            
                            <UF><![CDATA[ {{getEstado($imovel->uf, 'estados')}} ]]></UF>
                            <Cidade><![CDATA[ {{getCidade($imovel->cidade, 'cidades')}} ]]></Cidade>
                            <Bairro><![CDATA[ {{ $imovel->bairro }} ]]></Bairro>
                            <Endereco><![CDATA[ {{ $imovel->rua }} ]]></Endereco>
                            <Numero><![CDATA[ {{ $imovel->num }} ]]></Numero>
                            <Complemento><![CDATA[ {{ $imovel->complemento }} ]]></Complemento>                            

                            <DivulgarEndereco>{{ $imovel->exibirendereco }}</DivulgarEndereco>
                            @if ($imovel->exibirendereco == 1 && $imovel->latitude != '' && $imovel->longitude != '')
                                <VisualizarMapa>1</VisualizarMapa>
                                <Latitude>{{ $imovel->latitude }}</Latitude>
                                <Longitude>{{ $imovel->longitude }}</Longitude>
                            @endif
                 
                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <PrecoVenda>{{str_replace("." , "" , str_replace("," , "" , $imovel->valor_venda ) )}}</PrecoVenda>                                
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <PrecoVenda>{{str_replace("." , "" , str_replace("," , "" , $imovel->valor_venda ) )}}</PrecoVenda>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <PrecoLocacao>{{str_replace("." , "" , str_replace("," , "" , $imovel->valor_locacao ) )}}</PrecoLocacao>
                            @endif

                            <PrecoCondominio>{{str_replace("." , "" , str_replace("," , "" , $imovel->condominio ) )}}</PrecoCondominio>
                            <PrecoIptuImovel>{{str_replace("." , "" , str_replace("," , "" , $imovel->iptu ) )}}</PrecoIptuImovel>

                            <AreaUtil>{{ $imovel->area_util }}</AreaUtil>
                            <AreaTotal>{{ $imovel->area_total }}</AreaTotal>
                            @if ($imovel->medidas == 'm²')
                                <UnidadeMetrica>M2</UnidadeMetrica>
                            @else
                                <UnidadeMetrica>ha</UnidadeMetrica>
                            @endif
                            

                            @if (!empty($imovel->anodeconstrucao))
                            <AnoConstrucao>{{ $imovel->anodeconstrucao }}</AnoConstrucao>
                            @endif

                            <QtdDormitorios>{{ $imovel->dormitorios }}</QtdDormitorios>
                            <QtdBanheiros>{{ $imovel->banheiros }}</QtdBanheiros>
                            @if (!empty($imovel->suites))
                            <QtdSuites>{{ $imovel->suites }}</QtdSuites>
                            @endif
                            <QtdVagas>{{$imovel->garagem + $imovel->garagem_coberta}}</QtdVagas>
                 
                            <Fotos>
                                <Foto>
                                    <NomeArquivo><![CDATA[ {{ $imovel->titulo }} ]]></NomeArquivo>
                                    <URLArquivo><![CDATA[ {{url($imovel->cover())}} ]]></URLArquivo>
                                    <Principal>1</Principal>
                                    <Ordem>0</Ordem>
                                </Foto>
                                @if($imovel->images()->get()->count())                                    
                                    @foreach($imovel->images()->get() as $Key=>$image)
                                        <Foto>
                                            <NomeArquivo><![CDATA[ {{ $imovel->titulo }} ]]></NomeArquivo>
                                            <URLArquivo><![CDATA[ {{ $image->getUrlImageAttribute() }} ]]></URLArquivo>
                                            <Principal>0</Principal>
                                            <Ordem>{{$Key}}</Ordem>
                                        </Foto>                                        
                                    @endforeach
                                @endif
                            </Fotos>                 
                                     
                          </Imovel>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
</Imoveis>
</Carga>
@endif