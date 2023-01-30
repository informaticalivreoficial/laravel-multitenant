@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div id="subheader">
    <div class="container">
      <div class="row">
          <div class="span12">
            <h1 style="border-right:0px;"><strong>Pré reserva</strong></h1>
        </div>
      </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <form action="" method="post" class="form-inline j_formsubmit" autocomplete="off">
                @csrf
                <div class="booking-form">
                    <div class="span12">                        
                        <div class="row">
                            <div class="span12">
                                <div id="js-contact-result"></div>
                                <!-- HONEYPOT -->
                                <input type="hidden" class="noclear" name="bairro" value="" />
                                <input type="text" class="noclear" style="display: none;" name="cidade1" value="" />
                            </div>
                        </div>
                        <div class="row form_hide">
                            <h3 class="title span12">Tipo de Locação</h3>                            
                            <div class="span6"> 
                                <input type="radio" class="check_fisica" style="width:30px;" name="tipo_reserva" value="0" checked /><span style="color: #232323;" class="check_fisica">Pessoa Física</span>
                            </div>  
                            <div class="span6">                                
                                <input type="radio" class="check_empresa" style="width:30px;" name="tipo_reserva" value="1" /><span style="color: #232323;" class="check_empresa">Empresa</span>                                
                            </div> 
                        </div>
                        <div class="row div_empresa form_hide" style="margin-top: 10px;">
                            <h3 class="title span12">Dados da Empresa</h3>                            
                            <div class="span6">
                                <div class="form-group">
                                    <label><b>Nome da Empresa</b><span style="color:#FF0000;">*</span></label></label>
                                    <input type="text" name="empresa_nome" class="form-control inputheight"/>
                                </div>
                            </div>
                            <div class="span2">
                                <div class="form-group">
                                    <label><b>CNPJ</b></label>
                                    <input type="text" name="cnpj" class="form-control cnpjmask inputheight"/>
                                </div>
                            </div>
                            <div class="span2">
                                <div class="form-group">
                                    <label><b>Telefone Fixo</b></label>
                                    <input type="text" name="telefone_empresa" class="form-control telefonemask inputheight"/>
                                </div>
                            </div>
                            <div class="span2">
                                <div class="form-group">
                                    <label><b>Telefone Móvel</b><span style="color:#FF0000;">*</span></label>
                                    <input type="text" name="telefone_empresa" class="form-control telefonemask inputheight"/>
                                </div>
                            </div>
                        </div>
                        <div class="row form_hide" style="margin-top: 10px;">
                            <h3 class="title span12">Informações Pessoais</h3>

                            <div class="span3">
                                <span class="text-label"><b>Nome</b><span style="color:#FF0000;">*</span></span>
                                <input type="text" class="inputheight" name="nome"/>
                            </div>

                            <div class="span3">
                                <span class="text-label"><b>E-mail</b><span style="color:#FF0000;">*</span></span>
                                <input type="text" class="inputheight" name="email" />
                            </div>                        

                            <div class="span3">
                                <span class="text-label"><b>Telefone Fixo</b></span>
                                <input type="text" class="telefonemask inputheight" name="telefone" />
                            </div>

                            <div class="span3">
                                <span class="text-label"><b>Telefone Móvel</b><span style="color:#FF0000;">*</span></span>
                                <input type="text" class="celularmask inputheight" name="whatsapp" />
                            </div>
                        </div>
                        <div class="row form_hide" style="margin-top: 10px;">
                            <h3 class="title span12">Endereço</h3>
                            <div class="span3">
                                <span class="text-label"><b>Estado</b></span>
                                <select name="uf" class="selectReservas" id="state-dd">
                                    @if(!empty($estados))
                                        <option value="">Selecione</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->estado_id}}">{{$estado->estado_nome}}</option>
                                        @endforeach                                                                        
                                    @endif                                
                                </select>
                            </div>

                            <div class="span3">
                                <span class="text-label"><b>Cidade</b></span>
                                <select id="city-dd" class="selectReservas" name="cidade">
                                    <option value="">Selecione o Estado</option>
                                </select>
                            </div>

                            <div class="span4">
                                <span class="text-label"><b>Rua</b></span>
                                <input type="text" class="inputheight" name="endereco" />
                            </div>                        

                            <div class="span2">
                                <span class="text-label"><b>Número</b></span>
                                <input type="text" class="inputheight" name="num" />
                            </div>
                        </div>
                        <div class="row form_hide" style="margin-top: 10px;">
                            <div class="span4">
                                <span class="text-label"><b>Bairro</b></span>
                                <input type="text" class="inputheight" name="bairro" />
                            </div>
                            <div class="span3">
                                <span class="text-label"><b>Complemento</b></span>
                                <input type="text" class="inputheight" name="complemento" />
                            </div>
                            <div class="span2">
                                <span class="text-label"><b>CEP</b></span>
                                <input type="text" class="cepmask inputheight" name="cep" />
                            </div>
                        </div>
                        <div class="row form_hide" style="margin-top: 10px;">
                            <h3 class="title span12">Informações da Reserva</h3>
                            <div class="span3" style="margin-top: 10px;">
                                <span class="text-label"><i class="icon-group"></i>Qtd. de Pessoas<span style="color:#FF0000;">*</span></span>
                                <select name="num_adultos" class="selectReservas">                                     
                                    @for($i = 1; $i <= 13; $i++)
                                        <option value="{{$i}}" {{(!empty($dadosForm['num_adultos']) && $i == $dadosForm['num_adultos'] ? 'selected' : ($i == 0 ? 'selected' : ''))}}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="span2" style="margin-top: 10px;">
                                <span class="text-label"><i class="icon-calendar"></i>Check In<span style="color:#FF0000;">*</span></span>
                                <input type="text" data-language='pt-BR' class="datepicker-here inputheight" data-date-format="dd/mm/yyyy" style="background-color: #CCFFFF;" name="checkin" value="{{(!empty($dadosForm['checkini']) ? $dadosForm['checkini'] : '')}}" />
                            </div>        
                            <div class="span2" style="margin-top: 10px;">
                                <span class="text-label"><i class="icon-calendar"></i>Check Out<span style="color:#FF0000;">*</span></span>
                                <input type="text" data-language='pt-BR' class="datepicker-here inputheight" style="background-color: #CCFFFF;" name="checkout" value="{{(!empty($dadosForm['checkouti']) ? $dadosForm['checkouti'] : '')}}" />
                            </div>
                            <div class="span5" style="margin-top: 10px;">
                                <span class="text-label"><i class="icon-suitcase"></i>Imóvel<span style="color:#FF0000;">*</span></span>
                                <select name="apart_id" class="selectReservas">                                 
                                    @if(!empty($imoveis) && $imoveis->count() > 0)
                                        <option value="">Selecione</option>
                                        @foreach($imoveis as $apartamento)
                                            <option value="{{$apartamento->id}}" {{(!empty($dadosForm) && $dadosForm['apart_id'] == $apartamento->id ? 'selected' : '')}}>{{$apartamento->titulo}}</option>
                                        @endforeach                                                                        
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row form_hide" style="margin-top: 10px;">                                                
                            <div class="span12">      
                                <div style="float: right;width:40%;">
                                    <span class="text-label politicas"><a target="_blank" href="{{route('web.politica')}}">>Política de Reservas<</a></span>
                                    <button type="submit" id="js-contact-btn" class="btn btn-large btn-block btn-success">Enviar</button>
                                </div> 
                            </div>
                        </div>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{url(asset('backend/plugins/airdatepicker/css/datepicker.min.css'))}}" rel="stylesheet" type="text/css">
    <style>
        .inputheight{
            height: 25px !important;
        }
        .selectReservas{
            height: 35px !important;
        }
    </style>
@endsection

@section('js')
    <script src="{{url(asset('backend/plugins/airdatepicker/js/datepicker.min.js'))}}"></script>
    <script src="{{url(asset('backend/plugins/airdatepicker/js/i18n/datepicker.pt-BR.js'))}}"></script>
    <script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $cepmask = $(".cepmask");
        $cepmask.mask('99999-999', {reverse: false});
        var $cnpjmask = $(".cnpjmask");
        $cnpjmask.mask('99.999.999/9999-99', {reverse: false});
        var $celularmask = $(".celularmask");
        $celularmask.mask('(99) 99999-9999', {reverse: false});
        var $telefonemask = $(".telefonemask");
        $telefonemask.mask('(99) 9999-9999', {reverse: false});
    });

    $(function(){

        $('.div_empresa').css("display", "none");

        $('.check_empresa').click(function() {                       
            $('.div_empresa').css("display", "block");         
            $( ".check_empresa" ).prop( "checked", true );         
            $( ".check_fisica" ).prop( "checked", false );         
        });

        $('.check_fisica').click(function() {                       
            $('.div_empresa').css("display", "none");
            $( ".check_empresa" ).prop( "checked", false );         
            $( ".check_fisica" ).prop( "checked", true );        
        });


        $("#city-dd").attr("disabled", true);
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{route('web.fetchCity')}}",
                type: "POST",
                data: {
                    estado_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $("#city-dd").attr("disabled", false);
                    $('#city-dd').html('<option value="">Selecione a cidade</option>');
                    $.each(res.cidades, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .cidade_id + '">' + value.cidade_nome + '</option>');
                    });
                }
            });            
        });
             
    });

    $(function(){

        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.acomodacaoSend') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    $("#js-contact-btn").attr("disabled", true);
                    $('#js-contact-btn').html("Carregando...");                
                    $('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-130}, 'slow');
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
                    $("#js-contact-btn").attr("disabled", false);
                    $('#js-contact-btn').html('Enviar');                                
                }

            });

            return false;
        });
        
    });
    
</script>   
@endsection

