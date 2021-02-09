@extends("templates.{$template}.layouts.app")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                template basico de ejemplo si es que no existe ninguno activo
                {{$template}}
            </div>
        </div>
    </div>
</div>
@endsection