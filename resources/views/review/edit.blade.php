@extends('review.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Edit Paper </h2>
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

    <form action="{{ route('paper.update', $paper->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Paper Id: </strong>
                    <input type="text" name="paper_id" value="{{ $review->paper_id }}" class="form-control" placeholder="Paper Id">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> User Id: </strong>
                    <input type="text" name="user_id" value="{{ $review->user_id }}" class="form-control" placeholder="User Id">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Paper Rating: </strong>
                    <input type="text" name="paper_rating" value="{{ $review->paper_rating }}" class="form-control" placeholder="Paper Rating">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Review Status: </strong>
                    <input type="text" name="review_status" value="{{ $review->review_status }}" class="form-control" placeholder="Review Status">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Review Rating: </strong>
                    <input type="text" name="review_rating" value="{{ $review->review_rating }}" class="form-control" placeholder="Review Rating">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </form>

@endsection
