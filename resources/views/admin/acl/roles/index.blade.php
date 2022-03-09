@extends('adminlte::page')

@section('title', "Gerenciar Cargos")

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i> Cargos</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">                    
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item active">Cargos</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-right">
            @can('add_cargo')
            <a href="{{route('roles.create')}}" class="btn btn-default"><i class="fas fa-plus mr-2"></i> Cadastrar Novo</a>
            @endcan
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
            @if(!empty($roles) && $roles->count() > 0)
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr>
                            <th>Cargo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($roles as $role)                        
                        <tr>                       
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{route('role.permissoes',['idRole' => $role->id])}}" class="btn btn-xs btn-success text-white"><i class="fas fa-lock"></i></a>                                
                                @can('remove_cargo')
                                <a href="{{ route('roles.edit', [ 'id' => $role->id ]) }}" class="btn btn-xs btn-default"><i class="fas fa-pen"></i></a>
                                    <button type="button" class="btn btn-xs btn-danger text-white j_modal_btn" data-id="{{$role->id}}" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash"></i></button>
                                @endcan                                                                
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
            {{ $roles->links() }}
        </div>
    </div>
    <!-- /.card -->   
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm" action="" method="post">            
            @csrf
            @method('DELETE')
            <input id="id_cargo" name="cargo_id" type="hidden" value=""/>
                <div class="modal-header">
                    <h4 class="modal-title">Remover Cargo!</h4>
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
                var cargo_id = $(this).data('id');
                
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('roles.delete') }}",
                    data: {
                       'id': cargo_id
                    },
                    success:function(data) {
                        if(data.error){
                            $('.j_param_data').html(data.error);
                            $('#id_cargo').val(data.id);
                            $('#frm').prop('action','{{ route('roles.deleteon') }}');
                        }else{
                            $('#frm').prop('action','{{ route('roles.deleteon') }}');
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
            
            $('.toggle-class').on('change', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var post_id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: '{{ route('posts.postSetStatus') }}',
                    data: {
                        'status': status,
                        'id': post_id
                    },
                    success:function(data) {
                        
                    }
                });
            });
            
        });
    </script>
@endsection