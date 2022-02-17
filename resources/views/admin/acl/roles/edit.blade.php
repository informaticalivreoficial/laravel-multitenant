@extends('adminlte::page')

@section('title', 'Editar Cargo')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Editar Cargo</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles')}}">Cargos</a></li>
            <li class="breadcrumb-item active">Editar Cargo</li>
        </ol>
    </div>
</div>
@stop

@section('content')
<!-- Main content -->
<section class="content text-muted">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'danger'])
                        {{ $error }}
                        @endmessage
                    @endforeach
                @endif

                @if(session()->exists('message'))
                    @message(['color' => session()->get('color')])
                    {{ session()->get('message') }}
                    @endmessage
                @endif
            </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-teal card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-conteudo" role="tab" aria-controls="custom-tabs-conteudo" aria-selected="true">Conteúdo</a>
                            </li>                           
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf  
                        @method('PUT') 
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-conteudo" role="tabpanel" aria-labelledby="custom-tabs-conteudo-tab">
                                                       
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="labelforms"><b>*Cargo:</b></label>
                                            <input class="form-control" name="name" placeholder="Cargo" value="{{old('name') ?? $role->name}}">
                                        </div>
                                    </div>  
                                    <div class="col-4">
                                        <label class="labelforms" style="color: #fff;"><b>s</b></label>
                                        <button type="submit" class="btn btn-success btn-block btn-lg"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Agora</button>
                                    </div> 
                                </div>                                
                                <div class="row">                                    
                                    <div class="col-12">   
                                        <label class="labelforms"><b>Descrição:</b></label>
                                        <textarea class="form-control" rows="5" name="description">{{ old('description') ?? $role->description }}</textarea>                                                    
                                    </div>
                                </div> 
                            </div> 
                        </div>                        
                        </form>
                    </div>                    
                </div>                
                
            </div>
        </div>
    </div>
</section>
@stop