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
                    <input disabled type="text" name="paper_id" class="form-control" placeholder="Paper Id">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> User Id </strong>
                    <input type="text" name="user_id" class="form-control" placeholder="User Id">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Paper Rating </strong>
                    <input type="text" name="paper_rating" class="form-control" placeholder="Paper Rating">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Review Status </strong>
                    <input type="text" name="review_status" class="form-control" placeholder="Review Status">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Review Rating </strong>
                    <input type="text" name="review_rating" class="form-control" placeholder="Review Rating">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </form>
@endsection
