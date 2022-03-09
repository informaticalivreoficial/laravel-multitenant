@extends('adminlte::page')

@section('title', "Gerenciar Permissões")

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i> Permissões</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item active">Permissões</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{route('permissoes.create')}}" class="btn btn-default"><i class="fas fa-plus mr-2"></i> Cadastrar Novo</a>
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
                            <th>Permissões</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($permissoes as $permissao)                        
                        <tr style="{{ ($permissao->status == '1' ? '' : 'background: #fffed8 !important;')  }}">                       
                            <td>{{$permissao->name}}</td>                            
                            <td>
                                <a href="{{ route('permissoes.edit', [ 'id' => $permissao->id ]) }}" class="btn btn-xs btn-default"><i class="fas fa-pen"></i></a>
                                <a href="{{route('permissoes.perfis',[ 'idPermission' => $permissao->id ])}}" class="btn btn-xs btn-success text-white"><i class="fas fa-users"></i></a>
                                <button type="button" class="btn btn-xs btn-danger text-white j_modal_btn" data-id="{{$permissao->id}}" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash"></i></button>                                
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
    <!-- /.card -->   
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm" action="" method="post">            
            @csrf
            @method('DELETE')
            <input id="id_permissao" name="permissao_id" type="hidden" value=""/>
                <div class="modal-header">
                    <h4 class="modal-title">Remover Permissão!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="j_param_data"></span>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="submit" class="btn btn-primary">Excluir Agora</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection


@section('css')

<link href="{{url(asset('backend/plugins/bootstrap-toggle/bootstrap-toggle.min.css'))}}" rel="stylesheet">
@stop

@section('js')

<script src="{{url(asset('backend/plugins/bootstrap-toggle/bootstrap-toggle.min.js'))}}"></script>
    <script>
       $(function () {
           
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            //FUNÇÃO PARA EXCLUIR
            $('.j_modal_btn').click(function() {
                var permissao_id = $(this).data('id');
                
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('permissoes.delete') }}",
                    data: {
                       'id': permissao_id
                    },
                    success:function(data) {
                        if(data.error){
                            $('.j_param_data').html(data.error);
                            $('#id_permissao').val(data.id);
                            $('#frm').prop('action','{{ route('permissoes.deleteon') }}');
                        }else{
                            $('#frm').prop('action','{{ route('permissoes.deleteon') }}');
                        }
                    }
                });
            });
           
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
              event.preventDefault();
              $(this).ekkoLightbox({
                alwaysShowClose: true
              });
            }); 
            
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
            
        });
    </script>
@endsection