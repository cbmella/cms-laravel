@extends("templates.{$template}.layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>BLOG</h1>
                    @foreach ($posts as $post)
                        <a href="{{ route('show', $post->id) }}">ver</a>
                        <br>
                        {{ $post->title }}
                        <br>
                        {{ $post->excerpt }}
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
