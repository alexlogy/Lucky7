@extends('submission.layout')

@section('content')
    <div class="pull-left">
        <h2> </h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('submission.create') }}">
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

    @foreach ($submission as $submission)
        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $submission->paper_id }} </td>
            <td> {{ $submission->user_id }} </td>
            <td>
                <form action="{{ route('submission.destroy', $submission->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('submission.show', $submission->id) }}">
                        Show
                    </a>

                    <a class="btn btn-primary" href="{{ route('submission.edit', $submission->id) }}">
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

