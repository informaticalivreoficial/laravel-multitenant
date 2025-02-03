@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/renato.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

{{-- @section('auth_header', 'Acesso ao Gerenciador') --}}

@section('auth_body')

<div class="register-area">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center justify-content-between">
            <div class="col-md-6 offset-md-3">
                <div class="card register-card bg-gray p-2 p-sm-4 mt-5 boxl">
                    <div class="card-body">
                        {{-- Logo --}}
                        <div class="login-logo pb-4 text-center" style="width: 100%;">
                            <img width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{env('DESENVOLVEDOR_LOGO_ADMIN')}}" alt="{{env('DESENVOLVEDOR')}}" class="elevation-3">
                        </div>
                        {{--<p>Ainda não tem uma conta?<a class="ms-2" href="{{ $register_url }}">Assinar</a></p>--}}
                        <!-- Register Form -->
                        <div class="register-form my-2 my-lg-2">
                            <form action="{{ $login_url }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-0 {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" name="email" type="email" placeholder="Email">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-0 {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" placeholder="Senha">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-unlock me-2"></i>Entrar</button>
                            
                                <div class="login-meta-data d-flex align-items-center justify-content-between">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" name="remember" id="remember" type="checkbox" value="" checked>
                                        <label class="form-check-label" for="remember">Lembrar-me</label>
                                    </div><a class="forgot-password mt-3" href="{{ $password_reset_url }}">Esqueceu a senha?</a>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <style>
        .card{
            background-color: transparent;
            border:none;
        }
        .boxl{
            background-color: #fff;
            border-color: #eeeeee;
            border-radius: 6px;
            background-color: #f1f4fd !important;
        }
    </style>
@endsection
