@extends('adminlte::page')

@section('title', 'Gerenciar Empresas')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-building mr-2"></i> Empresas</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item active">Empresas</li>
        </ol>
    </div>
</div>
@stop

@section('content')

    <div class="card">
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
            @if(!empty($tenants) && $tenants->count() > 0)
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr>
                            <th>Logomarca</th>
                            <th>Empresa</th>
                            <th>CNPJ</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($tenants as $empresa)
                        <tr>
                            <td class="text-center">
                                <a href="{{$empresa->getlogomarca()}}" data-title="{{$empresa->name}}" data-toggle="lightbox">
                                    <img style="width: 50px;" alt="{{$empresa->name}}" src="{{$empresa->getlogomarca()}}">
                                </a>
                            </td>
                            <td>{{$empresa->name}}</td>
                            <td>{{$empresa->cnpj}}</td>
                            <td>{{--$user->name --}}</td>
                            <td>
                                @if($empresa->whatsapp != '')
                                    <a target="_blank" href="{{getNumZap($empresa->whatsapp)}}" class="btn btn-xs btn-success text-white"><i class="fab fa-whatsapp"></i></a>
                                @endif
                                @if($empresa->email != '')
                                    <a href="{{route('email.send',['id' => $empresa->id, 'parametro' => 'empresa'] )}}" class="btn btn-xs bg-teal text-white"><i class="fas fa-envelope"></i></a>
                                @endif                                
                                <a href="{{route('tenant.edit',['tenant' => $empresa->id])}}" class="btn btn-xs btn-default"><i class="fas fa-pen"></i></a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                
                </table>
            @else
                <div class="row mb-4">
                    <div class="col-12">                                                        
                        <div class="alert alert-info p-3">
                            Não foram encontrados registros!
                        </div>                                                        
                    </div>
                </div>
            @endif         
        </div>
        <div class="card-footer paginacao">  
            {{ $tenants->links() }}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->   

@endsection

@section('css')
<link rel="stylesheet" href="{{url(asset('backend/plugins/ekko-lightbox/ekko-lightbox.css'))}}">
@stop

@section('js')
<script src="{{url(asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js'))}}"></script>
<script>
   $(function () { 
       
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });
    });
</script>
@endsection