@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

{{-- @section('auth_header', __('adminlte::adminlte.register_message')) --}}

@section('auth_body')

<div class="register-area">
   <div class="container">
        <div class="row g-4 g-lg-5 align-items-center justify-content-between">
                <div class="col-12 col-lg-6">
                    <div class="card pricing-card boxl">
                        <div class="pricing-heading" style="margin-bottom: 10px;">
                            <div class="price">
                                <h6>{{ session('plan')->name ?? '' }}</h6>
                                <span class="fz-12 d-block">R$</span>
                                @if (session('plan')->avaliacao == 1)
                                  <h1 style="text-decoration:line-through;" class="mb-0 display-5 fw-bold text-info">{{session('plan')->valor}}</h1>
                                  <span style="color: darkgreen;" class="fz-12 d-block">30 dias Grátis</span>
                                @else
                                  <h1 class="mb-0 display-5 fw-bold text-info">{{session('plan')->valor}}</h1>
                                  <span class="fz-12 d-block">mensal</span>
                                @endif                              
                            </div>
                        </div>
                        <div class="pricing-desc my-2">
                           {!!session('plan')->content!!}
                        </div>                        
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card register-card bg-gray p-2 p-sm-4 boxl">
                        <div class="card-body">
                            {{-- Logo --}}
                            <div class="login-logo pb-4 text-center" style="width: 100%;">
                                <img width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{env('DESENVOLVEDOR_LOGO_ADMIN')}}" alt="{{env('DESENVOLVEDOR')}}" class="elevation-3">
                            </div>
                            <p>Já tem uma conta?<a class="ms-2" href="{{ $login_url }}">Login</a></p>
                            <div class="register-form my-2">
                                <form action="{{ $register_url }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-3">
                                        <input class="form-control rounded-0 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" type="text" placeholder="Nome do responsável">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control rounded-0 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" type="email" placeholder="Email">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control rounded-0 {{ $errors->has('empresa') ? 'is-invalid' : '' }}" name="empresa" value="{{ old('empresa') }}" type="text" placeholder="Empresa">
                                        @if($errors->has('empresa'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('empresa') }}</strong>
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
                                    <div class="form-group mb-3">
                                        <input class="form-control rounded-0 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" placeholder="Repetir Senha">
                                        @if($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    @if (session('plan')->avaliacao == 1)
                                        <button class="btn btn-primary w-100 btn-lg" type="submit">Experimentar 30 dias Grátis</button>
                                    @else
                                        <button class="btn btn-primary w-100 btn-lg" type="submit">Assinar</button>
                                    @endif                                    
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
