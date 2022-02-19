@extends('adminlte::page')

@section('title', 'Assinar Plano')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-check-square mr-2"></i> Assinar Plano</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item active">Assinar Plano</li>
        </ol>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12 my-2">
                <p>Preencha o formulário com suas informações de pagamento</p>
            </div>                
        </div>
    </div> 
    <div class="card-body  py-5">
        <div class="row">
            <div class="col-12">                
                <div class="alert alert-danger alert-dismissible" id="show-errors" style="display: none;"></div>
            </div>            
        </div>

        <div class="row">
            <div class="col-12">                    
                <form action="{{ route('assinatura.store') }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-5 mb-2">
                            <div class="form-group">
                                <label class="labelforms text-muted"><b>*Nome no cartão</b></label>
                                <input type="text" class="form-control" id="card-holder-name" placeholder="Nome no cartão" name="card-holder-name">
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-7 mb-2">
                            <div class="form-group">
                                <label class="labelforms" style="color: #fff;">s</label>
                                <div id="card-element"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <button id="card-buttom" data-secret="{{ $intent->client_secret }}" type="submit" class="btn btn-sm btn-block btn-info">Enviar</button>
                        </div>
                    </div>    
            
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('css')
<style>
    .StripeElement {
        background-color: white;
        height: calc(2.25rem + 2px);
        line-height: 1.5;
        padding: 0.475rem 0.85rem;
        border-radius: 4px;
        font-size: 1rem;
        border: 1px solid #ced4da;
        box-shadow: inset 0 0 0 transparent;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('js')
    {{-- Lib Stripe --}}
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('cashier.key') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        // subscription payment
        const form = document.getElementById('form')
        const cardHolderName = document.getElementById('card-holder-name')
        const cardButton = document.getElementById('card-buttom')
        const clientSecret = cardButton.dataset.secret
        const showErrors = document.getElementById('show-errors')
        form.addEventListener('submit', async (e) => {
            e.preventDefault()
            // Disable button
            cardButton.classList.add('cursor-not-allowed')
            cardButton.firstChild.data = 'Validando'
            // reset errors
            showErrors.innerText = ''
            showErrors.style.display = 'none'
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );
            if (error) {
                console.log(error)
                showErrors.style.display = 'block'
                showErrors.innerText = (error.type == 'validation_error') ? error.message : 'Dados inválidos, verifique e tente novamente!'
                cardButton.classList.remove('cursor-not-allowed')
                return;
            }
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit()
        })
    </script>
@endsection