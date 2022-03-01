@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="breadcrumb--area" style="height: 120px;background-color: #0811fb;"></div>

<div class="saasbox-blog-area mt-5">
    <div class="container">
      <div class="row g-2">
            <div class="col-12">
                <h1>Política de Privacidade</h1>
                {!! $tenant->politicas_de_privacidade !!}
            </div>
        </div>
    </div>
</div>
  
@endsection