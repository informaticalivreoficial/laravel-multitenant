@extends('web.cliente.master.master')

@section('content')

@if (!empty($planos) && $planos->count() > 0)
    @foreach ($planos as $plano)
        <p>{{$plano->name}} - Valor: R${{$plano->valor}} - <a href="{{route('web.assinar',['slug' => $plano->slug])}}">Assinar</a></p>
    @endforeach
@endif
    
@endsection