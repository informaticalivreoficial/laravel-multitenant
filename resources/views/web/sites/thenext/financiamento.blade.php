@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="contact-1 content-area-7">
    <div class="container">
        <div class="row mb-20">
            <div class="col-12 text-center">
                <h2 class="mb-3">Simulador de Financiamento de Imóvel</h2>
                <p class="mt-3">
                    Pensando em comprar um imóvel? Faça uma simulação com uma das mais baixas 
                    taxas do mercado e encontre a melhor opção de financiamento para você. 
                    Ajudamos você a estar mais próximo da sua casa dos sonhos com o simulador 
                    de financiamento imobiliário.
                </p>
            </div>
            <div class="col-md-12">
                <div class="contact-form contact-pad">
                    <form action="" method="post">
                        <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="valor-imovel" class="form-label">Valor do Imóvel</label>
                                <input type="email" name="valor" class="form-control" id="valor-imovel">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="entrada" class="form-label">Entrada</label>
                                <input type="email" name="prazo" class="form-control" id="entrada">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="prazo" class="form-label">Prazo</label>
                                <input type="email" name="prazo" class="form-control" id="prazo">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="prazo" class="form-label">Prazo</label>
                                <button type="button" style="width: 100%;" class="button-theme btn-3 btn-success btn-lg">Success</button>
                            </div>                            
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection