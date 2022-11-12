@extends('bid.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Edit Paper </h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bid.index') }}"> Back </a>
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

    <form action="{{ route('bid.update', $bid->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Title: </strong>
                    <input type="text" name="title" value="{{ $bid->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Content: </strong>
                    <input type="text" name="content" value="{{ $bid->content }}" class="form-control" placeholder="Content">
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
