@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )

@if (config('adminlte.use_route_url', false))
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif

{{-- @section('auth_header', __('adminlte::adminlte.password_reset_message'))--}}

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
                        <p>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </p>
                        <div class="register-form my-2 my-lg-2">
                            <form action="{{ $password_email_url }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-0 {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" name="email" type="email" placeholder="Email">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>                                
                                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-lock me-2"></i>Enviar link de redefinição de senha</button>
                            
                               
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
