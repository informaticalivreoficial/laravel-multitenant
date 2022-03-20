@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_contact py-5 bg-light text-center">
    <div class="container">
        <h1 class="text-front">Atendimento</h1>
        <p>Preencha o formulário abaixo e nossa equipe lhe responderá o mais breve possível!</p>
        
        <div class="row text-left">
            <form class="j_formsubmit" action="" method="post" autocomplete="off">
                @csrf
                <div id="js-contact-result"></div>
                <div class="form-group form_hide">
                    <!-- HONEYPOT -->
                    <input type="hidden" class="noclear" name="tenant_id" value="{{$tenant->id}}" />
                    <input type="hidden" class="noclear" name="bairro" value="" />
                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                </div>
                <div class="form-group form_hide">
                    <input type="text" name="nome" class="form-control" placeholder="*Insira seu nome"/>
                </div>
                <div class="form-group form_hide">
                    <input type="text" name="email" class="form-control" placeholder="*Insira seu email"/>
                </div>
                <div class="form-group form_hide">
                    <input type="tel" name="telefone" id="fone" class="form-control" placeholder="Insira seu telefone com DDD"/>
                </div>
                <div class="form-group form_hide">
                    <textarea class="form-control" name="mensagem" rows="5" placeholder="*Digite sua mensagem..."></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-front text-white form_hide" id="js-contact-btn">Enviar Agora</button>
                </div>
            </form>
        </div>
    </div> 
</div>

<div class="main_contact_types py-5">
    <div class="container">
        <div class="row text-center">
            <div class="pb-4 col-12 col-md-6 col-lg-4">
                <h2 class="icon-envelope">Por E-mail</h2>
                <p>Nossa equipe lhe responderá o mais breve!</p>
                <a href="mailto:{{$tenant->email}}" class="text-front">{{$tenant->email}}</a>
            </div>
            <div class="pb-4 col-12 col-md-6 col-lg-4">
                <h2 class="icon-phone">Por Telefone</h2>
                <p>Estamos disponíveis nos números abaixo durante horário comercial.</p>
                
                @if(!empty($tenant->telefone))
                    <a href="tel:55+ {{$tenant->telefone}}" class="text-front">{{$tenant->telefone}}</a>
                @endif
                @if(!empty($tenant->celular))
                    <a href="tel:55+ {{$tenant->celular}}" class="text-front">{{$tenant->celular}}</a>
                @endif
                                
                
            </div>
            <div class="pb-4 col-12 col-md-6 col-lg-4">
                <h2 class="icon-share-1">Redes Sociais</h2>
                <p>Fique por dentro de tudo que acontece em nossas redes sociais.</p>
                <p>
                    @if(!empty($tenant->facebook))
                        <a target="_blank" href="{{$tenant->facebook}}" title="Facebook"><button class="btn btn-front icon-facebook icon-notext text-white"></button></a>
                    @endif
                    @if(!empty($tenant->twitter))
                        <a target="_blank" href="{{$tenant->twitter}}" title="Twitter"><button class="btn btn-front icon-twitter icon-notext text-white"></button></a>
                    @endif
                    @if(!empty($tenant->linkedin))
                        <a target="_blank" href="{{$tenant->linkedin}}" title="Linkedin"><button class="btn btn-front icon-linkedin icon-notext text-white"></button></a>
                    @endif
                    @if(!empty($tenant->instagram))
                        <a target="_blank" href="{{$tenant->instagram}}" title="Instagram"><button class="btn btn-front icon-instagram icon-notext text-white"></button></a>
                    @endif
                </p>
            </div>
        </div>
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
                    form.find('#js-contact-btn').html("Enviar Agora");                                
                }

            });

            return false;
        });

    });
</script>
@endsection