@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> </h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('paper.create') }}">
                    Bid to Review Papers
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
            <th> Paper ID </th>
            <th> Title </th>
            <th> Content </th>
            <th> Reviewer(s) </th>
            <th> Bid </th>
            <th width="280px"> Action </th>
        </tr>

    @foreach ($paper as $paper)
        <tr>
           <td> {{ $paper->pid }} </td>
            <td> {{ $paper->title }} </td>
            <td> {{ $paper->content }} </td>
            <td> {{ $paper->user_id }} </td>
          <form action="{{ route('bid.store') }}" method="POST">
            <input type="hidden" name="paper_id" value="{{ $paper->pid }}">
            <input type="hidden" name="user_id" value="{{ $paper->pid }}">
            <td> <input type="checkbox" id="bid_status" name="bid_status" value="TRUE"> <label for="bid_status">Check to Bid</label> </td>
            <td>
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger">Bid</button>
          </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection