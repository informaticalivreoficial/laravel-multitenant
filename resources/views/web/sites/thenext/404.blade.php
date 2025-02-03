@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="error-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="error404-content">
                    <div class="error404">404</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="nobottomborder">
                    <h1>Desculpe página não encontrada ou ela não existe!!</h1>
                    <a class="btn-1 btn-outline-1" href="{{route('web.home')}}">
                        <span>Retornar para o início</span> <i class="arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection