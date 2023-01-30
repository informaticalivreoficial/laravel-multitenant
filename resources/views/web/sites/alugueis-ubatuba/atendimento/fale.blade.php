@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div id="subheader">
    <div class="container">
      <div class="row">
          <div class="span12">
            <h1><strong>Atendimento</strong></h1>
            <span><strong>Envie suas dúvidas ou sugestões!</strong></span>
        </div>
      </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span8">
                <h4>Preencha o formulário abaixo!</h4>
                <br />
                <div class="contact_form_holder">
                    <form id="contact" class="row j_formsubmit" method="post" action="" autocomplete="off">
                        @csrf
                        <div class="span8">
                            <div id="js-contact-result"></div>
                        </div>
                        
                        <div class="form-group form_hide">
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                        </div>
                        <div class="span4 form_hide">
                            <label>Nome <span class="req" style="color: #FF0000;">*</span></label>
                            <input type="text" class="full" name="nome" id="name" value="" />
                        </div>
            
                        <div class="span4 form_hide">
                            <label>E-mail <span class="req" style="color: #FF0000;">*</span></label>
                            <input type="text" class="full" name="email" id="email" value="" />
                        </div>
                        
                        <div class="span8 form_hide">
                            <label>Menssagem <span class="req" style="color: #FF0000;">*</span></label>
                            <textarea cols="10" rows="10" name="mensagem" id="message" class="full"></textarea> 
                            <button type="submit" name="submit" id="js-contact-btn" class="btn btn-success">Enviar Agora</button>
                        </div>                
                    </form>
                </div>        
            </div> 
                
            <div id="sidebar" class="span4">                  
               <div class="widget latest_news">
                    <h4 class="title">Canais de Atendimento</h4>
                    @if(!empty($tenant->telefone))
                        <p style="font-size: 18px;font-weight: 400;margin-bottom:20px;" title="Telefone"><img src="{{url(asset('frontend/'.$tenant->template.'/img/fone.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/> <strong><a href="tel:55+ {{$tenant->telefone}}" class="text-front">{{$tenant->telefone}}</a></strong></p>
                    @endif
                    @if(!empty($tenant->celular))
                        <p style="font-size: 18px;font-weight: 400;margin-bottom:20px;" title="Telefone"><img src="{{url(asset('frontend/'.$tenant->template.'/img/fone.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/> <strong><a href="tel:55+ {{$tenant->celular}}" class="text-front">{{$tenant->celular}}</a></strong></p>
                    @endif
                    @if ($tenant->whatsapp)
                        <p style="font-size: 18px;font-weight: 400;margin-bottom:20px;" title="WatsApp"><img src="{{url(asset('frontend/'.$tenant->template.'/img/zapzap.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/> <strong><a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">{{$tenant->whatsapp}}</a></strong></p>                                                                
                    @endif
                    @if ($tenant->email)
                        <p style="font-size: 18px;font-weight: 400;" title="{{$tenant->email}}"><img src="{{url(asset('frontend/'.$tenant->template.'/img/email.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/><a href="mailto:{{$tenant->email}}"><strong>{{$tenant->email}}</strong></a></p>
                    @endif
                    @if ($tenant->email1)
                    <p style="font-size: 18px;font-weight: 400;" title="{{$tenant->email1}}"><img src="{{url(asset('frontend/'.$tenant->template.'/img/email.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/><a href="mailto:{{$tenant->email1}}"><strong>{{$tenant->email1}}</strong></a></p>
                    @endif
                    @if ($tenant->skype)
                    <p style="font-size: 18px;font-weight: 400;margin-bottom:20px;" title="Skype"><img src="{{url(asset('frontend/'.$tenant->template.'/img/skype.png'))}}" style="float:left;margin-right:15px;margin-top:-3px"/> <strong>{{$tenant->email}}</strong></p>
                    @endif
                </div>
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