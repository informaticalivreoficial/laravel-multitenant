@if(!empty($portal) && $portal->count() > 0)
<?=
'<?xml version="1.0" encoding="UTF-8"?>' .PHP_EOL
?>
<ListingDataFeed xmlns="http://www.vivareal.com/schemas/1.0/VRSync" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.vivareal.com/schemas/1.0/VRSync">

<Header>
    <Provider>Renato Montanari</Provider>
    <Email>remontanari@live.com</Email>
    <ContactName><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></ContactName>
    <PublishDate>2021-06-06T17:47:57</PublishDate>
    <Telephone>12-99138 5030</Telephone>
</Header>
        @if(!empty($pimoveis) && $pimoveis->count() > 0)
        <Listings>
            @foreach($pimoveis as $pimovel)
                @if(!empty($imoveis) && $imoveis->count() > 0)
                    @foreach($imoveis as $imovel)
                        @if($imovel->id == $pimovel->imovel)                        
                            <Listing>
                                <ListingID>{{$imovel->id}}</ListingID>
                                <Title><![CDATA[ {{$imovel->titulo}} ]]></Title>
                                
                                <PublicationType>{{($imovel->publication_type == '0' ? 'STANDARD' : 
                                ($imovel->publication_type == '1' ? 'PREMIUM' : 
                                ($imovel->publication_type == '2' ? 'SUPER_PREMIUM' : 'STANDARD')))}}</PublicationType>

                                @if($imovel->venda == '1' && $imovel->locacao == '1')
                                    <TransactionType>Sale/Rent</TransactionType>                                    
                                    <ListPrice currency="BRL">{{str_replace(',00', '', str_replace('.', '', $imovel->valor_venda))}}</ListPrice>
                                    <RentalPrice currency="BRL" period="Monthly">{{str_replace(',00', '', str_replace('.', '', $imovel->valor_locacao))}}</RentalPrice>                                    
                                @elseif($imovel->venda == '1' && $imovel->locacao == '0')
                                    <TransactionType>For Sale</TransactionType>                                    
                                    <ListPrice currency="BRL">{{str_replace(',00', '', str_replace('.', '', $imovel->valor_venda))}}</ListPrice>                                    
                                @elseif($imovel->venda == '0' && $imovel->locacao == '1')
                                    <TransactionType>For Rent</TransactionType>                                    
                                    <RentalPrice currency="BRL" period="Monthly">{{str_replace(',00', '', str_replace('.', '', $imovel->valor_locacao))}}</RentalPrice>                                    
                                @endif

                                <PropertyAdministrationFee currency="BRL">{{str_replace(',00', '', str_replace('.', '', $imovel->condominio))}}</PropertyAdministrationFee>
                                <YearlyTax currency="BRL">{{str_replace(',00', '', str_replace('.', '', $imovel->iptu))}}</YearlyTax>
                                <Description><![CDATA[ {{ strip_tags($imovel->descricao)}} ]]></Description>
                                
                                <PropertyType>{{($imovel->tipo == 'Apartamento' ? 'Residential / Apartment' : 
                                  ($imovel->tipo == 'Casa' ? 'Residential / Home' : 
                                  ($imovel->tipo == 'Sítio' ? 'Residential / Farm Ranch' : 
                                  ($imovel->tipo == 'Sala Comercial' ? 'Commercial / Building' : 
                                  ($imovel->tipo == 'Fazenda' ? 'Commercial / Agricultural' : 
                                  ($imovel->tipo == 'Terreno em Condomínio' ? 'Residential / Land Lot' : 
                                  ($imovel->tipo == 'Terreno' ? 'Residential / Land Lot' : 
                                  ($imovel->tipo == 'Cobertura' ? 'Residential / Penthouse' : 
                                  ($imovel->tipo == 'Studio' ? 'Commercial / Business' : 
                                  ($imovel->tipo == 'Kitnet' ? 'Residential / Kitnet' : 
                                  ($imovel->tipo == 'Salão de Festa' ? 'Commercial / Office' : 
                                  ($imovel->tipo == 'Chalé' ? 'Residential / Kitnet' : 
                                  ($imovel->tipo == 'Hotel/Pousada' ? 'Commercial / Building' : 
                                  ($imovel->tipo == 'Sobrado' ? 'Residential / Sobrado' : 
                                  ($imovel->tipo == 'Loja' ? 'Commercial / Business' : 
                                  ($imovel->tipo == 'Prédio/Edifício Inteiro' ? 'Commercial / Edificio Comercial' : 'Residential / Home'))))))))))))))))}}</PropertyType>    

                                <Features>
                                    @if($imovel->pertodeescolas == true)
                                        <Feature>Close to schools</Feature>
                                    @endif
                                    @if($imovel->ar_condicionado == true)
                                        <Feature>Cooling</Feature>
                                    @endif
                                    @if($imovel->lareira == true)
                                        <Feature>Fireplace</Feature>
                                    @endif
                                    @if($imovel->mobiliado == true)
                                        <Feature>Furnished</Feature>
                                    @endif
                                    @if($imovel->lavanderia == true)
                                        <Feature>Laundry</Feature>
                                    @endif
                                    @if($imovel->escritorio == true)
                                        <Feature>Home Office</Feature>
                                    @endif
                                    @if($imovel->portaria24hs == true)
                                        <Feature>Security Guard on Duty</Feature>
                                    @endif
                                    @if($imovel->interfone == true)
                                        <Feature>Intercom</Feature>
                                    @endif
                                    @if($imovel->condominiofechado == true)
                                        <Feature>Fenced Yard</Feature>
                                    @endif
                                    @if($imovel->sistemadealarme == true)
                                        <Feature>Alarm System</Feature>
                                    @endif
                                    @if($imovel->espaco_fitness == true)
                                        <Feature>Gym</Feature>
                                    @endif
                                    @if($imovel->jardim == true)
                                        <Feature>Garden Area</Feature>
                                    @endif
                                    @if($imovel->elevador == true)
                                        <Feature>Elevator</Feature>
                                    @endif
                                    @if($imovel->churrasqueira == true)
                                        <Feature>BBQ</Feature>
                                    @endif
                                    @if($imovel->salaodefestas == true)
                                        <Feature>Party Room</Feature>
                                    @endif
                                    @if($imovel->varandagourmet == true)
                                        <Feature>Veranda</Feature>
                                    @endif
                                    @if($imovel->piscina == true)
                                        <Feature>Pool</Feature>
                                    @endif
                                    @if($imovel->permiteanimais == true)
                                        <Feature>Pets Allowed</Feature>
                                    @endif
                                    @if($imovel->quadrapoliesportiva == true)
                                        <Feature>Sports Court</Feature>
                                    @endif
                                    @if($imovel->salaodejogos == true)
                                        <Feature>Game room</Feature>
                                    @endif
                                    @if($imovel->sauna == true)
                                        <Feature>Sauna</Feature>
                                    @endif
                                    @if($imovel->vista_para_mar == true)
                                        <Feature>Ocean View</Feature>
                                    @endif
                                    @if($imovel->geradoreletrico == true)
                                        <Feature>Generator</Feature>
                                    @endif
                                </Features>

                                <LivingArea unit="square metres">{{ $imovel->area_util }}</LivingArea>
                                <LotArea unit="square metres">{{ $imovel->area_total }}</LotArea> 
                                <Bathrooms>{{ $imovel->banheiros }}</Bathrooms>
                                <Bedrooms>{{ $imovel->dormitorios }}</Bedrooms>
                                <Garage>{{$imovel->garagem + $imovel->garagem_coberta}}</Garage>
                                <Suites>{{ $imovel->suites }}</Suites>

                                @if ($imovel->categoria == 'Imóvel Residencial')
                                    <UsageType>Residential</UsageType>
                                @elseif ($imovel->categoria == 'Comercial/Industrial')
                                    <UsageType>Commercial</UsageType>
                                @else
                                    <UsageType>Residential</UsageType>
                                @endif

                                @if ($imovel->anodeconstrucao != '')
                                    <YearBuilt>2016</YearBuilt>
                                @endif                                                                

                                <Location displayAddress="{{($imovel->exibirendereco == 1 ? 'All' : 'Neighborhood')}}">
                                        <Country abbreviation="BR">Brasil</Country>
                                        <State abbreviation="SP">Sao Paulo</State>
                                        <City><![CDATA[ {{getCidade($imovel->cidade, 'cidades')}} ]]></City>
                                        <Neighborhood><![CDATA[ {{$imovel->bairro}} ]]></Neighborhood>
                                        <Address><![CDATA[ {{$imovel->rua}} ]]></Address>
                                        <StreetNumber><![CDATA[ {{$imovel->num}} ]]></StreetNumber>
                                        <Complement><![CDATA[ {{$imovel->complemento}} ]]></Complement>
                                        <PostalCode><![CDATA[ {{$imovel->cep}} ]]></PostalCode>
                                        @if ($imovel->exibirendereco == 1 && $imovel->latitude != '' && $imovel->longitude != '')
                                            <Latitude><![CDATA[ {{ $imovel->latitude }} ]]></Latitude>
                                            <Longitude><![CDATA[ {{ $imovel->longitude }} ]]></Longitude>
                                        @else 
                                            <Latitude>-23.5531131</Latitude>
                                            <Longitude>-46.659864</Longitude>                       
                                        @endif                                        
                                </Location>

                                <Media>
                                        <Item medium="image" caption="img1" primary="true"><![CDATA[ {{url($imovel->cover())}} ]]></Item>
                                        @if($imovel->images()->get()->count())                                    
                                            @foreach($imovel->images()->get() as $Key=>$image)
                                                <Item medium="image" caption="img{{$Key}}"><![CDATA[ {{ $image->getUrlImageAttribute() }} ]]></Item>                                        
                                            @endforeach
                                        @endif                                        
                                </Media>

                                <ContactInfo>
                                    <Name><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></Name>
                                    <Email>{{ $Configuracoes->email }}</Email>
                                    <Website>{{url('imovel/'.$imovel->slug)}}</Website>
                                    <Logo>{{$configuracoes->getlogomarca()}}</Logo>
                                    <OfficeName><![CDATA[ {{ $Configuracoes->nomedosite }} ]]></OfficeName>
                                    <Telephone>{{ $Configuracoes->telefone1 }}</Telephone>
                                    <Location>
                                        <Country abbreviation="BR">Brasil</Country>
                                        <State abbreviation="{{getEstado($configuracoes->uf, 'estados', 'estado_uf')}}"><![CDATA[ {{getEstado($configuracoes->uf, 'estados')}} ]]></State>
                                        <City><![CDATA[ {{getCidade($Configuracoes->cidade, 'cidades')}} ]]></City>
                                        <Neighborhood><![CDATA[ {{ $Configuracoes->bairro }} ]]></Neighborhood>
                                        <Address><![CDATA[ {{ $Configuracoes->rua }} ]]>, {{ $Configuracoes->num }}</Address>
                                        <PostalCode>{{ $Configuracoes->cep }}</PostalCode>
                                    </Location>
                                </ContactInfo>

                            </Listing>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </Listings>
        @endif
</ListingDataFeed>
@endif