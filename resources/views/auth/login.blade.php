@extends('layouts.login')

@section('pageTitle', 'Iniciar Sesión')

@section('content')
    <div class="container">
        <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-xs-12">
            <div class="card">
                <div class="card-content">
                    <h3 class="text-center">Iniciar Sesión</h3>
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group label-floating {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Correo electrónico</label>
                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required >
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group label-floating {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Contraseña</label>
                            <div>
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar mis datos
                                </label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success outline btn-block">
                                Iniciar
                            </button>
                            <a class="" href="{{ route('password.request') }}">
                                ¿Has olvidado tu contraseña?
                            </a>
                        </div>
                    </form>
                </div>

                <div class="panel-footer text-center">
                    <a class="" href="{{ route('register') }}">
                        Solicita tu cuenta de usuario!
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

