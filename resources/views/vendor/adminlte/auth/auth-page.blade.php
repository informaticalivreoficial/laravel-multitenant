<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        
        <meta name="author" content="Renato Montanari"/>
        <meta name="copyright" content="2020 Super Imóveis Sistema Imobiliário"> 
        
        <link rel="stylesheet" href="{{url(asset('frontend/superimoveis/css/all-css-libraries.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/superimoveis/css/style.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('backend/assets/css/renato.css'))}}"/>

        @hasSection('css')
            @yield('css')
        @endif

        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{url(asset('frontend/superimoveis/img/faveicon.png'))}}"/>
        <link rel="apple-touch-icon" href="{{url(asset('frontend/superimoveis/img/faveicon.png'))}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{url(asset('frontend/superimoveis/img/faveicon.png'))}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{url(asset('frontend/superimoveis/img/faveicon.png'))}}"/>


    </head>

{{--@extends('adminlte::master')--}}

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

{{--
@section('classes_body'){{ ($auth_type ?? 'login') . '-page login-body' }}@stop
--}}

{{--@section('body')--}}
<body class="login-body">

    <div class="{{ $auth_type ?? 'login' }}-box">
        
        

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
{{--@stop--}}
</body>
</html>

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
