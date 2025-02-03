@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="contact-1 content-area-7">
    <div class="container">
        <div class="row mb-20">
            <div class="col-12 text-center">
                <h2 class="mb-3"><b>Simulador de Financiamento de Imóvel</b></h2>
                <p class="mt-3">
                    Pensando em comprar um imóvel? Faça uma simulação com uma das mais baixas 
                    taxas do mercado e encontre a melhor opção de financiamento para você. 
                    Ajudamos você a estar mais próximo da sua casa dos sonhos com o simulador 
                    de financiamento imobiliário.
                </p>
            </div>
            <div class="col-md-12">
                <div class="contact-form contact-pad">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="valorimovel" class="form-label">Valor do Imóvel</label>
                                <input type="text" name="valor" class="form-control mask-money" id="valorimovel">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="entrada" class="form-label">Entrada</label>
                                <input type="text" name="entrada" class="form-control mask-money" id="entrada">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="prazo" class="form-label">Prazo</label>
                                <input type="number" min="1" max="35" name="prazo" class="form-control" id="prazo" value="35">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="prazo" class="form-label" style="color: #FAFAFA">Simular</label>
                                <button type="button" style="width: 100%;" id="btncalcula" class="button-theme btn-3 btn-success btn-lg">Calcular</button>
                            </div>                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <p>
                                Taxa de Juros<br>
                                <b>9.99%</b> ao ano
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <p>
                                Primeira Parcela<br>
                                <b>R$ 890,20</b>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <p>
                                Última Parcela<br>
                                <b>R$ 276,99</b>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <p>
                                Renda Mensal Familiar Bruta<br>
                                <b>R$ 2.967</b>
                            </p>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p>
                    *As taxas, cálculos e resultados apresentados possuem são meramente 
                    informativos, usam o sistema de amortização constante e podem não refletir 
                    as condições de financiamento oficiais.Para uma consulta personalizada 
                    com nossos corretores <a href="{{route('web.atendimento')}}">clique aqui</a>.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $money = $(".mask-money");
        $money.mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});
    });

    $(function (){

        var juros = 9;
        var valorimovel = document.getElementById('valorimovel');
        var entrada = document.getElementById('entrada');

        $('#btncalcula').click(function (){
            var soma = parseInt(valorimovel.value) - parseInt(entrada.value);
            console.log(entrada.value);
            console.log(valorimovel.value);
            console.log(soma);
        });

        
    });

    function cleanNumber($val){
        var clean = value.replace(/[^0-9,]*/g, '').replace(',', '.');
    }
</script>
@endsection