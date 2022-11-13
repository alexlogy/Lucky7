@extends('review.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Edit Review </h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('review.index') }}"> Back </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input. <br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>

                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('review.update', $review->rid) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="rid" value="{{ $review->rid }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Paper Id: </strong>
                    <input type="text" disabled name="paper_id" value="{{ $review->paper_pid }}" class="form-control" placeholder="Paper Id">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Reviewer Id: </strong>
                    <input type="text" disabled name="user_id" value="{{ $review->user_id }}" class="form-control" placeholder="User Id">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Current Paper Rating: </strong>
                    <input type="text" readonly name="paper_rating" value="{{ $review->paper_rating }}" class="form-control" placeholder="Paper Rating">
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-sm-12">
          <strong> Update Paper Rating: </strong>
                <div class="form-group">
                    <input type="radio" id="three" name="paper_rating" value="3">
                    <label for="three">3 (strong accept)</label>
                    <input type="radio" id="two" name="paper_rating" value="2">
                    <label for="two">2 (accept)</label>
                    <input type="radio" id="one" name="paper_rating" value="1">
                    <label for="one">1 (weak accept)</label>
                    <input type="radio" id="zero" name="paper_rating" value="0">
                    <label for="zero">0 (borderline paper)</label>
                    <input type="radio" id="neg1" name="paper_rating" value="-1">
                    <label for="neg1">-1 (weak reject)</label>
                    <input type="radio" id="neg2" name="paper_rating" value="-2">
                    <label for="neg2">-2 (reject)</label>
                    <input type="radio" id="neg3" name="paper_rating" value="-3">
                    <label for="neg3">-3 (strong reject)</label>
                </div>
            </div>



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Review: </strong>
                    <input type="text" name="review_status" value="{{ $review->review_status }}" class="form-control" placeholder="Review Status">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"> Save </button>
            </div>
        </div>
    </form>

@endsection
