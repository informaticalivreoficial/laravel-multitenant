@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_property">
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h2 class="text-front">Política de Privacidade</h2>
            </p>
        </div>
    </div>
    <div class="main_property_content py-y">
        <div class="container">
            <div class="row py-4">
                <div class="col-12"> 
                    <div class="main_property_content_features mt-3">
                        {!! $tenant->politicas_de_privacidade !!}
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
@endsection