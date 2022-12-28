@extends('adminlte::page')

@section('title', "Vincular Permissão ao cargo {$role->name}")

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i> Vincular Permissão ao cargo {{$role->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('role.permissoes',['idRole' => $role->id])}}">Permissões do cargo</a></li>
            <li class="breadcrumb-item active">Vincular Permissão</li>
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
            @if(!empty($permissoes) && $permissoes->count() > 0)
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Permissão</th>               
                        </tr>
                    </thead>
                    <tbody> 
                        <form action="{{route('role.permissoes.store',['idRole' => $role->id])}}" method="post">
                        @csrf
                            @foreach($permissoes as $permissao)                        
                                <tr>                       
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{$permissao->id}}">    
                                    </td>
                                    <td>{{$permissao->name}}</td>                          
                                </tr>                            
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-center">
                                    <button type="submit" class="btn btn-success text-white">Vincular</button>
                                </td>
                            </tr>
                        </form>
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