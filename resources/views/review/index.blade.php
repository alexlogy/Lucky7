@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> Review Paper</h2>
    </div>

    <table class="table table-bordered">
        <tr>
        <th> No </th>
            <th> Paper ID </th>
            <th> Paper Title </th>
            <th> Paper Content </th>
            <th width="280px"> Action </th>
        </tr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('viewReviews') }}">
                    View Reviews
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
            <td> {{ $review->pid }} </td>
            <td> {{ $review->title }} </td>
            <td> {{ $review->content }} </td>
            <td>
                <form action="{{ route('review.create') }}" method="GET">
                    <input type="hidden" name="paper_id" value="{{ $review->pid }}">
                    <button type="submit" class="btn btn-success">Create Review</button>
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
