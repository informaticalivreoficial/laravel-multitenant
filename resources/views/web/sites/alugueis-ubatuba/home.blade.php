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
@endsection

@section('css')
    
@endsection

@section('js')
  
@endsection