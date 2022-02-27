@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Política de Privacidade</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">Política de Privacidade</li>
            </ul>
        </div>
    </div>
</div>

<div class="properties-details-page content-area">
    <div class="container">
        <div class="row mb-20">
            <div class="col-12">
                {!! $tenant->politicas_de_privacidade !!}
            </div>
        </div>
    </div>
</div>

@endsection