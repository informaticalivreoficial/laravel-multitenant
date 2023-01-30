@extends("web.sites.{$tenant->template}.master.master")

@section('content')
    @if (!empty($slides) && $slides->count() > 0)
        <div id="slider">
            <div class="callbacks_container">
                <ul class="rslides pic_slider">
                    @foreach ($slides as $key => $slide)
                        <li>
                            <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}" />
                        </li>                    
                    @endforeach
                </ul>
            </div>
        </div>
    @endif 
    
    @if(!empty($imoveisParaLocacao) && $imoveisParaLocacao->count() > 0)
        <div class="clearfix"></div>

        <div id="content">
            <div class="container">        	
                <div class="row">
                    <div class="text-center">
                        <h2>Imóveis para Locação</h2>
                        <br /><br />
                    </div>                   
                
                    @foreach($imoveisParaLocacao as $ilocacao)
                        <div class="room span4" style="height: 550px !important;">
                            <a href="{{ route('web.rentProperty', ['slug' => $ilocacao->slug]) }}">
                                <img data-original="{{$ilocacao->cover()}}" src="{{$ilocacao->cover()}}" class="img-polaroid" alt="{{$ilocacao->titulo}}" />
                            </a>            

                            <h4>{{$ilocacao->titulo}}</h4>
                            <div class="description">
                                {!!$ilocacao->descricao!!}
                            </div>
                            <div class="row">
                                <ul class="room-features">  
                                    @if ($ilocacao->churrasqueira)
                                        <li class="span2"><i class="icon-check-sign"></i>Churrasqueira</li>
                                    @endif 
                                    @if ($ilocacao->ventilador_teto)
                                        <li class="span2"><i class="icon-check-sign"></i>Ventilador de teto</li>
                                    @endif 
                                    @if ($ilocacao->geladeira)
                                        <li class="span2"><i class="icon-check-sign"></i>Geladeira</li>
                                    @endif 
                                    @if ($ilocacao->ar_condicionado)
                                        <li class="span2"><i class="icon-check-sign"></i>Ar Condicionado</li>
                                    @endif 
                                    @if ($ilocacao->estacionamento)
                                        <li class="span2"><i class="icon-check-sign"></i>Estacionamento</li>
                                    @endif 
                                    @if ($ilocacao->internet)
                                        <li class="span2"><i class="icon-check-sign"></i>Wi-Fi</li>
                                    @endif 
                                    @if ($ilocacao->saladetv)
                                        <li class="span2"><i class="icon-check-sign"></i>Tv Lcd</li>
                                    @endif 
                                </ul>
                            </div>
                        </div>                        
                    @endforeach
                </div>          
            </div>        
        </div>
    @endif
@endsection

@section('css')
    
@endsection

@section('js')
  
@endsection