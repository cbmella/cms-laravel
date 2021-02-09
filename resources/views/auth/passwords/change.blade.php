@extends('layouts.app-back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-4 mb-3">
            <p class="t-enchanted">Cambiar contraseña</p>
            <hr class="hr-enchanted">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 text-center">
            <div id="card-v2" class="card">
                <div id="card-body-v2" class="card-body p-0">
                    <form method="POST" action="{{ route('changePassword') }}" data-toggle="validator">
                        {{ csrf_field() }}
                        @if(session()->has('message'))
                        <div class="alert {{ session()->get('feedback') }}">
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('contrasena-actual') ? ' has-error' : '' }}">
                            <label for="nueva-contrasena" class="col-12 control-label">Contraseña actual</label>
                            <div class="col-12">
                                <input placeholder="Password" required id="contrasena-actual" type="password" class="form-control mt-4 mb-3" name="contrasena-actual">
                                @if ($errors->has('contrasena-actual'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contrasena-actual') }}</strong>
                                </span>
                                @endif
                                <span class="help-block">
                                    <strong class="help-block with-errors"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nueva-contrasena') ? ' has-error' : '' }}">
                            <label for="nueva-contrasena" class="col-12 control-label">Nueva contraseña</label>
                            <div class="col-12">
                                <input placeholder="New Password" data-error="6 caracteres mínimo" data-minlength="6" required id="nueva-contrasena" type="password" class="form-control mt-4 mb-3" name="nueva-contrasena">
                                @if ($errors->has('nueva-contrasena'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nueva-contrasena') }}</strong>
                                </span>
                                @endif
                                <span class="help-block">
                                    <strong class="help-block with-errors"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nueva-contrasena-confirm" class="col-12 control-label">Repetir nueva contraseña</label>
                            <div class="col-12">
                                <input placeholder="Confirm Password" data-match-error="Contraseña no coincide" data-match="#nueva-contrasena" required id="nueva-contrasena-confirm" type="password" class="form-control mt-4 mb-3" name="nueva-contrasena_confirmation">
                            </div>
                            <span class="help-block">
                                <strong class="help-block with-errors"></strong>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-12 col-sm-10 offset-sm-1 text-center">
                                <button type="submit" class="btn btn-primary">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection