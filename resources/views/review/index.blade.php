@extends('review.layout')

@section('content')
    <div class="pull-left">
        <h2> </h2>
    </div>

    <table class="table table-bordered">
        <tr>
            <th> No </th>
            <th> Paper ID </th>
            <th> Reviewer ID </th>
            <th> Paper Rating </th>
            <th> Review </th>
            <th> Review Rating </th>
            <th width="280px"> Action </th>
        </tr>
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

    @foreach ($userJoin as $review)
        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $review->title }} </td>
            <td> {{ $review->name }} </td>
            <td> {{ $review->paper_rating }} </td>
            <td> {{ $review->review_status }} </td>
            <td> {{ $review->review_rating }} </td>
            <td>
                <form action="{{ route('review.destroy', $review->rid) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('review.edit', $review->rid) }}">
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
    
    <form action="{{ route('change', $user_id) }}" method="POST">
      <input type="hidden" name="id" value="{{ $user_id }}">
      <label>Current review limit: {{ $user_limit_no }}</label><br>
      <label for="limit">Set new limit:</label><br>
      <input type="text" id="limit" name="max_review_no">
      @csrf
      @method('POST')
      
      <input type="submit" value="set">
      
    </form>

    @endsection
