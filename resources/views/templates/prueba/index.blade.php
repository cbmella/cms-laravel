@extends("templates.{$template}.layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                     {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
