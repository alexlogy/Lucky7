@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> Pending Bid Request </h2>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th> ID </th>
            <th> Paper Title </th>
            <th> Paper Content </th>
            <th> Reviewer(s) </th>
            <th> Reviewer Email </th>
            <th width="280px"> Action </th>
        </tr>
        <?php $i=0; ?>
    @foreach ($cc_bid as $bid)

        <tr>
           <td> {{ $i++ }} </td>
            <td> {{ $bid->title }} </td>
            <td> {{ $bid->content }} </td>
            <td> {{ $bid->name }} </td>
            <td> {{ $bid->email }}</td>
            <td>
                <form action="{{ route('cc_bid.update', $bid->bid) }}" method="POST">
                @csrf
                @method('PUT')
                    <input hidden type="text" name="bid" value="{{ $bid->bid }}">
                    <input hidden type="text" name="reviewer" value="{{ $bid->name}}">
                    <input hidden type="text" name="title" value="{{ $bid->title}}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary"> Allow </button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
