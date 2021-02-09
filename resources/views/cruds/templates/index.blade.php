@extends('layouts.app-back')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>templates</h2>
            </div>
            <div class="pull-right">
                @can('template-create')
                    <a class="btn btn-success mb-3" href="{{ route('templates.create') }}"> Upload Template</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($templates as $template)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $template->name }}</td>
                <td>
                    <form action="{{ route('templates.destroy', $template->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('templates.show', $template->id) }}">Show</a>
                        {{-- @can('template-edit')
                        <a class="btn btn-primary" href="{{ route('templates.edit', $template->id) }}">Edit</a>
                        @endcan --}}
                        @csrf
                        @method('DELETE')
                        @can('template-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $templates->links() !!}


    <p class="text-center text-primary"><small></small></p>
@endsection
