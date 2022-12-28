@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="breadcrumb--area" style="height: 120px;background-color: #0811fb;"></div>

<!-- Contact Area-->
<div class="saasbox-contact-us-area mt-5 mb-5">
    <div class="container"> 
        <div class="row g-4 justify-content-between">
            <div class="col-12 text-center">
                <h1 class="text-front">Atendimento</h1>
                <p>Preencha o formulário abaixo e nossa equipe lhe responderá o mais breve possível!</p>
            </div>
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="contact-form">
                        <form class="j_formsubmit" action="" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12">                                
                                    <div id="js-contact-result"></div>
                                    <!-- HONEYPOT -->
                                    <input type="hidden" class="noclear" name="tenant_id" value="{{$tenant->id}}" />
                                    <input type="hidden" class="noclear" name="bairro" value="" />
                                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                    <input type="hidden" name="assunto" value="#Atendimento Super Imóveis">
                                </div>
                                <div class="col-12 col-lg-4 form_hide">
                                    <label class="form-label" for="name">Nome:</label>
                                    <input class="form-control mb-30" id="name" type="text" name="nome">
                                </div>
                                <div class="col-12 col-lg-4 form_hide">
                                    <label class="form-label" for="email">Email:</label>
                                    <input class="form-control mb-30" id="email" type="email" name="email">
                                </div>
                                <div class="col-12 col-lg-4 form_hide">
                                    <label class="form-label" for="telefone">telefone:</label>
                                    <input class="form-control mb-30 telefonemask" id="telefone" type="text" name="telefone">
                                </div>
                                <div class="col-12 form_hide">
                                    <label class="form-label" for="message">Menssagem:</label>
                                    <textarea class="form-control mb-30" id="message" name="mensagem"></textarea>
                                </div>
                                <div class="col-12 text-center form_hide">
                                    <button class="btn btn-primary w-100 btn-lg" type="submit" id="js-contact-btn">Enviar Agora</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="contact-side-info mb-4 mb-md-0">
                    <div class="contact-mini-card-wrapper">
                        @if ($tenant->email)
                            <div class="contact-mini-card">
                                <div class="contact-mini-card-icon"><i class="bi bi-envelope"></i></div>
                                <p><a href="mailto:{{$tenant->email}}">{{$tenant->email}}</a></p>
                            </div>
                        @endif
                        @if ($tenant->celular)
                            <div class="contact-mini-card">
                                <div class="contact-mini-card-icon"><i class="bi bi-phone"></i></div>
                                <p><a href="tel:{{$tenant->celular}}">{{$tenant->celular}}</a></p>
                            </div>
                        @endif
                        
                        <!-- Contact Mini Card-->
                        <div class="contact-mini-card">
                            <div class="contact-mini-card-icon"><i class="bi bi-tag"></i></div>
                            <p>Atendimento de segunda a sexta - 09:00 as 18:00</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
  </div>

  <div class="mb-120 d-block"></div>

@endsection

@section('js')
<script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $telefone = $(".telefonemask");
        $telefone.mask('(99) 9999-9999', {reverse: false});               
    });
</script>
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
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-100}, 'slow');
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