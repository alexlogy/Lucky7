@extends('review.layout')

@section('content')
    <div class="pull-left">
        <h2> </h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('review.create') }}">
                    Create New Review
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
            <th> Paper Id </th>
            <th> User Id </th>
            <th> Paper Rating </th>
            <th> Review Status </th>
            <th> Review Rating </th>
            <th width="280px"> Action </th>
        </tr>

    @foreach ($review as $review)
        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $review->paper_id }} </td>
            <td> {{ $review->user_id }} </td>
            <td> {{ $review->paper_rating }} </td>
            <td> {{ $review->review_status }} </td>
            <td> {{ $review->review_rating }} </td>
            <td>
                <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('review.show', $review->id) }}">
                        Show
                    </a>

                    <a class="btn btn-primary" href="{{ route('review.edit', $review->id) }}">
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

