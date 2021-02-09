@extends('layouts.app-back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-4 mb-3">
            <p>Actualizar mis datos</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 text-center">
            <div id="card-v2" class="card">
                <div id="card-body-v2" class="card-body p-0">
                    <form method="POST" action="{{ route('updateProfile') }}" data-toggle="validator">
                        {{ csrf_field() }}
                        @if(session()->has('message'))
                        <div class="alert {{ session()->get('feedback') }}">
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-12 control-label">Nombre</label>
                            <div class="col-12">
                                <input value="{{ Auth::user()->name }}" placeholder="Nombre" required id="name" type="text" class="form-control mt-4 mb-3" name="name">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                <span class="help-block">
                                    <strong class="help-block with-errors"></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-12 control-label">Email</label>
                            <div class="col-12">
                                <input value="{{ Auth::user()->email }}" placeholder="Email" required id="email" type="email" class="form-control mt-4 mb-3" name="email">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <span class="help-block">
                                    <strong class="help-block with-errors"></strong>
                                </span>
                            </div>
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