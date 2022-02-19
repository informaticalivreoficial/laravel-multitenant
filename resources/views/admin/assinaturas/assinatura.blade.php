@extends('adminlte::page')

@section('title', 'Sua Assinatura')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-check-square mr-2"></i> Sua Assinatura</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item active">Sua Assinatura</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 my-2">
                    <h2><b>Plano Atual:</b> Plano Prime</h2>
                </div>                
            </div>
        </div>        
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">                
                    @if(session()->exists('message'))
                        @message(['color' => session()->get('color')])
                            {{ session()->get('message') }}
                        @endmessage
                    @endif
                </div>            
            </div>

            <div class="row">
                <div class="col-12">                    
                    <p>
                        <b>Data Início:</b>  10/02/2022<br>
                        <b>Data Expiração:</b>  13/03/2022<br>
                        <b>Situação:</b> <span class="text-success">Ativa <i class="fas fa-smile"></i></span><br> 
                        <b>Cancelar Assinatura?</b> <br> 
                        Se realmente quer desistir, e cancelar sua assinatura para não ter mais acesso 
                        a todos os recursos disponíveis, basta <b><a href="http://">(Clicar Aqui!)</a></b> e cancelar a assinatura!
                    </p>
                </div>
            </div>
            @if (!empty($invoices && $invoices->count() > 0))
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Plano</th>
                                    <th>Data</th>
                                    <th>Expiração</th>
                                    <th>Status</th>
                                    <th>valor</th>
                                    <th>Fatura</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>Plano Premium</td>
                                <td>{{\Carbon\Carbon::parse($invoice->date())->format('d/m/Y')}}</td>
                                <td>10/02/2022</td>
                                <td><span class="text-success">Ativo</span></td>
                                <td>{{str_replace('.', ',',$invoice->total())}}</td>
                                <td><a href="{{route('assinatura.downloadInvoice',['invoice' => $invoice->id])}}">Baixar</a></td>
                            </tr>
                        @endforeach      
                        </tbody>
                        </table>
                    </div>                
                </div>
            @endif
        </div>
        
    </div>
  

@stop

@section('css')

@stop

@section('js')
   <script>
       $(function () {           
           
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
         
         
        });
    </script>
@endsection