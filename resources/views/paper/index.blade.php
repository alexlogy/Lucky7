@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> View papers </h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('paper.create') }}">
                    Create New Paper
                </a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th> No </th>
            <th> Title </th>
            <th> Content </th>
            <th width="280px"> Action </th>
        </tr>

    @foreach ($paper as $paper)
        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $paper->title }} </td>
            <td> {{ $paper->content }} </td>
            <td>
                <form action="{{ route('paper.destroy', $paper->pid) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('paper.show', $paper->pid) }}">
                        Show
                    </a>

                    <a class="btn btn-primary" href="{{ route('paper.edit', $paper->pid) }}">
                        Edit
                    </a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
