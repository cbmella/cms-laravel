@extends('layouts.app-back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                <h5>Welcome, {{ auth()->user()->email }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection