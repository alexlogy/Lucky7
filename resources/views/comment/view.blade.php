@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> Reviews and Comments </h2>
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
            <th> Paper ID </th>
            <th> Title </th>
            <th> Content </th>
        </tr>
        <tr>
            <td> {{ $paper->pid }} </td>
            <td> {{ $paper->title }} </td>
            <td> {{ $paper->content }} </td>
        </tr>
    </table>

    <div class="pull-left">
        <h3> Reviews... </h3>
    </div>
    <table class="table table-bordered">
      <tr>
          <th> Reviewer ID </th>
          <th> Review </th>
      </tr>
    @foreach ($reviews as $review)
        <tr>
            <td> {{ $review->rid }} </td>
            <td> {{ $review->review_status }} </td>
        </tr>
    @endforeach
    </table>

    <div class="pull-left">
        <h3> Comments... </h3>
    </div>
    <table class="table table-bordered">
      <tr>
          <th> Reviewer </th>
          <th> Comment </th>
      </tr>
    @foreach ($comments as $comment)
      <tr>
          <td> {{ $comment->user_id }} </td>
          <td> {{ $comment->comment }} </td>
      </tr>
    @endforeach
      <tr>
          <td>
              <form action="{{ route('comment.store') }}" method="POST">
                <input type="hidden" name="paper_id" value="{{ $paper->pid }}">
                <input type="text" required id="new_comment" name="new_comment" placeholder="Enter your comments here...">
                @csrf
                @method("POST")
                  <button type="submit" class="btn btn-danger">Add Comment</button>
              </form>
          </td>
      </tr>
    </table>
@endsection
