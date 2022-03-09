@extends('adminlte::page')

@section('title', "Permissões do cargo {$role->name}")

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i> Permissões do cargo {{$role->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles')}}">Cargos</a></li>
            <li class="breadcrumb-item active">Permissões do cargo {{$role->name}}</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{route('role.permissoes.create',['idRole' => $role->id])}}" class="btn btn-default"><i class="fas fa-plus mr-2"></i> Vincular Permissão</a>
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
            @if(!empty($permissoes) && $permissoes->count() > 0)
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr>
                            <th>Permissão</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($permissoes as $permissao)                        
                        <tr>                       
                            <td>{{$permissao->name}}</td>
                            <td>
                                <a href="{{route('role.permissoes.desvincular',['idRole' => $role->id, 'idPermission' => $permissao->id])}}" class="btn btn-xs btn-danger text-white"><i class="fas fa-trash"></i></a>                                
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
            {{ $permissoes->links() }}
        </div>
    </div> 

@endsection