@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div id="subheader">
    <div class="container">
      <div class="row">
          <div class="span12">
            <h1 style="border-right:0px;"><strong>{{$imovel->titulo}}</strong></h1>
        </div>
      </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span8">
                <div class="callbacks_container">
                    <ul class="rslides pic_slider">
                        @if($imovel->images()->get()->count())
                            @foreach($imovel->images()->get() as $image)                                    
                                <li>
                                    <img style="height: 450px !important;" src="{{ $image->getUrlImageAttribute() }}" data-original="{{ $image->getUrlImageAttribute() }}" alt="{{$imovel->titulo}}" />
                                </li>
                            @endforeach
                        @endif            
                    </ul>
                </div>
            </div>
            
            <div class="span4">
                <div class="room-description">
                    <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-show-faces="true" data-share="true"></div>
                    <p>&nbsp;</p>
                    {!!$imovel->descricao!!}
                </div>
                
                <div class="row list-features">
                    <ul class="room-features">                    
                        @if ($imovel->churrasqueira)
                            <li class="span2"><i class="icon-check-sign"></i>Churrasqueira</li>
                        @endif 
                        @if ($imovel->ventilador_teto)
                            <li class="span2"><i class="icon-check-sign"></i>Ventilador de teto</li>
                        @endif 
                        @if ($imovel->geladeira)
                            <li class="span2"><i class="icon-check-sign"></i>Geladeira</li>
                        @endif 
                        @if ($imovel->ar_condicionado)
                            <li class="span2"><i class="icon-check-sign"></i>Ar Condicionado</li>
                        @endif 
                        @if ($imovel->estacionamento)
                            <li class="span2"><i class="icon-check-sign"></i>Estacionamento</li>
                        @endif 
                        @if ($imovel->internet)
                            <li class="span2"><i class="icon-check-sign"></i>Wi-Fi</li>
                        @endif 
                        @if ($imovel->saladetv)
                            <li class="span2"><i class="icon-check-sign"></i>Tv Lcd</li>
                        @endif   
                    </ul>
                </div>

                <div class="row" style="text-align: center;">
                    @if ($imovel->exibivalores == true)
                        @if(!empty($type) && $type == 'venda')
                            <p style="font-size:26px;">Valor <strong>R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</strong></p>                            
                        @elseif(!empty($type) && $type == 'locacao')
                            <p style="font-size:26px;">Valor <strong>R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</strong></p>
                        @else
                            @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->rent == true && !empty($imovel->valor_locacao))
                                <p style="font-size:26px;">Valor <strong>R$ {{ str_replace(',00', '', $imovel->valor_venda) }} ou R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</strong></p>
                            @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                <p style="font-size:26px;">Valor <strong>R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</strong></p>
                            @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                <p style="font-size:26px;">Valor <strong>R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</strong></p>
                            @else
                                <p>Entre em contato com a nossa equipe comercial!</p>
                            @endif
                        @endif                        
                        <br />
                    @endif
                    @if ($imovel->locacao == true)
                        <a href="{{route('web.reservar')}}">
                            <button class="btn btn-large btn-primary" type="button">Reservar Agora</button>
                        </a>
                    @endif                                         
                </div>                     
            </div>
        </div>	

        @if (!empty($imoveis) && $imoveis->count() > 0)
            <hr />

            <div class="text-center">
                <h2>Veja Também</h2>
                <br /><br />
            </div>

            <div class="row room-list"> 
                @foreach ($imoveis as $item)
                    <div class="room span4">
                        <div class="btn-book-container">
                            <a href="{{route('web.reservar')}}" class="btn-book">Reservar Agora</a>
                        </div>

                        <a href="">
                            <img data-original="{{$item->cover()}}" src="{{$item->cover()}}" class="img-polaroid" alt="{{$item->titulo}}" />
                        </a>
                        <h4>{{$item->titulo}}</h4>
                        <div class="description">
                            {!!$item->descricao!!}
                        </div>
                        <div class="row">
                            <ul class="room-features">
                                @if ($item->churrasqueira)
                                    <li class="span2"><i class="icon-check-sign"></i>Churrasqueira</li>
                                @endif 
                                @if ($item->ventilador_teto)
                                    <li class="span2"><i class="icon-check-sign"></i>Ventilador de teto</li>
                                @endif 
                                @if ($item->geladeira)
                                    <li class="span2"><i class="icon-check-sign"></i>Geladeira</li>
                                @endif 
                                @if ($item->ar_condicionado)
                                    <li class="span2"><i class="icon-check-sign"></i>Ar Condicionado</li>
                                @endif 
                                @if ($item->estacionamento)
                                    <li class="span2"><i class="icon-check-sign"></i>Estacionamento</li>
                                @endif 
                                @if ($item->internet)
                                    <li class="span2"><i class="icon-check-sign"></i>Wi-Fi</li>
                                @endif 
                                @if ($item->saladetv)
                                    <li class="span2"><i class="icon-check-sign"></i>Tv Lcd</li>
                                @endif
                            </ul>
                        </div>
                        <div class="row" style="text-align:center;"> 
                            <br />
                            @if ($imovel->exibivalores == true)
                                @if($item->venda == true)
                                <div class="span2" style="padding:5px 0 5px 0;"> 
                                    <div class="price-info">
                                        <span class="price">R$ {{ str_replace(',00', '', $item->valor_venda) }}</span>
                                    </div>
                                </div>
                            @elseif($item->locacao == true)
                                <div class="span2" style="padding:5px 0 5px 0;"> 
                                    <div class="price-info">
                                        <span class="price">R$ {{ str_replace(',00', '', $item->valor_locacao) }}</span>
                                    </div>
                                </div>
                            @else
                                @if($item->venda == true && !empty($item->valor_venda) && $item->locacao == true && !empty($item->valor_locacao))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $item->valor_venda) }} ou Locação R$ {{ str_replace(',00', '', $item->valor_locacao) }}</span>
                                        </div>
                                    </div>
                                @elseif($item->venda == true && !empty($item->valor_venda))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $item->valor_venda) }}</span>
                                        </div>
                                    </div>
                                @elseif($item->locacao == true && !empty($item->valor_locacao))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $item->valor_locacao) }}</span>
                                        </div>
                                    </div>
                                @else
                                    <p>Entre em contato com a nossa equipe comercial!</p>
                                @endif
                            @endif
                            @endif                            
                            <div class="span2" style="padding:5px 0 5px 0;">
                                <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($item->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $item->slug]) }}" class="btn btn-primary">+ Detalhes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Seletor, Evento/efeitos, CallBack, Ação
        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.sendEmail') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find("#js-contact-btn").attr("disabled", true);
                    form.find('#js-contact-btn').html("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-40}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn();                    
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find("#js-contact-btn").attr("disabled", false);
                    form.find('#js-contact-btn').html("Enviar");                                
                }

            });

            return false;
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });

    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYSFkpHgtfdOA9WNnUOVjt2PLlBfC9xvU&callback=markMap"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection