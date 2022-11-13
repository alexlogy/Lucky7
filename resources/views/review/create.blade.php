@extends('review.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                Add New Review
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('review.index') }}">
                    Back
                </a>
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

    <form action="{{ route('review.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                   <strong> Paper Id </strong>
                    <input type="text" readonly name="paper_pid" class="form-control" placeholder="Paper Id" value="{{ $pid }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Reviewer Id </strong>
                    <input type="text" readonly name="user_id" class="form-control" value="{{ $user->id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
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

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Review </strong>
                    <input type="text" name="review_status" class="form-control" placeholder="Write your review here...">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </form>
@endsection
