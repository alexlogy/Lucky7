@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> View Reviews </h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('viewReviews') }}"> Back </a>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th> Review ID </th>
            <th> Paper ID </th>
            <th> Reviewer </th>
            <th> Paper Rating </th>
            <th> Review </th>
            <th width="280px"> Action </th>
        </tr>

    @foreach ($reviews as $review)
        <tr>
           <td> {{ $review->rid }} </td>
            <td> {{ $review->paper_pid }} </td>
            <td> {{ $review->user_id }} </td>
            <td> {{ $review->paper_rating}} </td>
            <td> {{ $review->review_status }} </td>
            <td>
                <form action="{{ route('review.destroy', $review->rid) }}" method="POST">
                @csrf
                @method('DELETE')
                    <input type="hidden" name="paper_id" value="{{ $review->paper_pid }}">
                    <a class="btn btn-primary" href="{{ route('review.edit', $review->rid) }}">
                        Edit
                    </a>

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <form action="{{ route('addComment') }}" method="GET">
                    <input type="hidden" name="paper_id" value="{{ $review->paper_pid }}">
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
@endsection
