@extends('paper.layout')

@section('content')
    <div class="pull-left">
        <h2> </h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('comment.create') }}">
                    Create New Comment
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

    @foreach ($comment as $comment)
        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $comment->paper_id }} </td>
            <td> {{ $comment->user_id }} </td>
            <td>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('comment.show', $comment->id) }}">
                        Show
                    </a>

                    <a class="btn btn-primary" href="{{ route('comment.edit', $comment->id) }}">
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

