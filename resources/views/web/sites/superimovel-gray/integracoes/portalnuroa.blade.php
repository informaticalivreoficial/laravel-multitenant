@if(!empty($portal) && $portal->count() > 0)
<?=
'<?xml version="1.0" encoding="UTF-8"?>' .PHP_EOL
?>
<nuroa>
        @if(!empty($pimoveis) && $pimoveis->count() > 0)
            @foreach($pimoveis as $pimovel)
                @if(!empty($imoveis) && $imoveis->count() > 0)
                    @foreach($imoveis as $imovel)
                        @if($imovel->id == $pimovel->imovel)
                        <property>
                            <id><![CDATA[ {{$imovel->id}} ]]></id>
                            <link><![CDATA[ {{url('imovel/'.$imovel->slug)}} ]]></link> 

                            <pictures>
                                @if($imovel->images()->get()->count())                                    
                                    @foreach($imovel->images()->get() as $Key=>$image)
                                        <picture>
                                            <picture_url><![CDATA[ {{ $image->getUrlImageAttribute() }} ]]></picture_url>
                                            <picture_title><![CDATA[ {{ $imovel->titulo }} ]]></picture_title>
                                        </picture>                                        
                                    @endforeach
                                @endif                                                                
                            </pictures> 

                            <agency_name><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></agency_name>
                            <agency_address><![CDATA[ {{getCidade($Configuracoes->cidade, 'cidades')}} ]]></agency_address> 

                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <ad_type>buy</ad_type>
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <ad_type>buy</ad_type>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <ad_type>rent</ad_type>
                            @endif 
                            
                            <category><![CDATA[ {{ $imovel->tipo }} ]]></category> 

                            <title><![CDATA[ {{$imovel->titulo}} ]]></title>
                            <description><![CDATA[ {{ $imovel->descricao}} ]]></description>
                            <rooms><![CDATA[ {{ $imovel->dormitorios }} ]]></rooms>
                            <bathrooms><![CDATA[ {{ $imovel->banheiros }} ]]></bathrooms>
                            <square_meters><![CDATA[ {{ $imovel->area_total }} ]]></square_meters>
                            
                            @if($imovel->venda == '1' && $imovel->locacao == '1')
                                <price><![CDATA[ {{ $imovel->valor_venda }} ]]></price>                                
                            @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                <price><![CDATA[ {{ $imovel->valor_venda }} ]]></price>
                            @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                <price><![CDATA[ {{ $imovel->valor_locacao }} ]]></price>
                            @endif
                            <currency><![CDATA[ BRL ]]></currency>

                            <city><![CDATA[ {{getCidade($imovel->cidade, 'cidades')}} ]]></city>
                            <country><![CDATA[ Brasil ]]></country>
                            <location><![CDATA[ {{ $imovel->rua }} ]]></location>
                            <postcode><![CDATA[ {{ $imovel->cep }} ]]></postcode>
                            <neighbourhood><![CDATA[ {{ $imovel->bairro }} ]]></neighbourhood>
                            
                            @if ($imovel->exibirendereco == 1 && $imovel->latitude != '' && $imovel->longitude != '')
                                <longitude><![CDATA[ {{ $imovel->latitude }} ]]></longitude>
                                <latitude><![CDATA[ {{ $imovel->longitude }} ]]></latitude>
                            @else 
                                <longitude>0</longitude>
                                <latitude>0</latitude>                       
                            @endif

                            <insertion_date><![CDATA[ @php echo date('d/m/Y', strtotime($imovel->created_at)); @endphp ]]></insertion_date>
                                              
                          </property>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
</nuroa>
@endif