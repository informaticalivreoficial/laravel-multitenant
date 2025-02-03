@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div id="subheader">
    <div class="container">
      <div class="row">
          <div class="span12">
            <h1 style="border-right:0px;"><strong>Política de Privacidade</strong></h1>
        </div>
      </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="room-description">
                    {!! $tenant->politicas_de_privacidade !!}
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection