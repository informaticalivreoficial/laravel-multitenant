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
                    <h2><b>Plano Atual:</b> {{$user->tenant->plan->name}}</h2>
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
                        <b>Data Início:</b>  {{\Carbon\Carbon::parse($user->tenant->subscription)->format('d/m/Y')}}<br>
                        <b>Situação:</b> 
                            @if (Auth::user()->subscription('default')->ended())
                                <span class="text-success">Expirado <i class="fas fa-smile"></i></span>
                            @else
                                <span class="text-success">Ativa <i class="fas fa-smile"></i></span>
                            @endif
                        <br> 
                        
                        @if (Auth::user()->subscription('default'))
                            @if (Auth::user()->subscription('default')->onGracePeriod())
                                <a href="{{route('assinatura.resume')}}"><b>Reativar Assinatura</b></a>
                            @else
                                <b>Cancelar Assinatura?</b> <br> 
                                Se realmente quer desistir, e cancelar sua assinatura para não ter mais acesso 
                                a todos os recursos disponíveis, basta <b><a href="{{route('assinatura.cancel')}}">(Clicar Aqui!)</a></b> e cancelar a assinatura!
                            @endif                        
                        @else
                            [Assinar Plano Premium]
                        @endif 

                    </p>
                </div>
            </div>
            @if (!empty($invoices && $invoices->count() > 0))
                <div class="row">
                    <div class="col-12 table-responsive">
                        <h3><i class="fas fa-history"></i> Histórico</h3>
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
                        {{--dd($invoice->lines->data[0]['period']->end)--}}
                            <tr>
                                <td>{{$user->tenant->plan->name}}</td>
                                <td>{{\Carbon\Carbon::createFromTimestamp($invoice->lines->data[0]['period']->start)->format('d/m/Y')}}</td>
                                <td>{{\Carbon\Carbon::createFromTimestamp($invoice->lines->data[0]['period']->end)->format('d/m/Y')}}</td>
                                <td>
                                    @if ($invoice->status == 'paid')
                                    <span class="text-success">Aprovado</span>
                                    @endif
                                </td>
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
  
@endsection