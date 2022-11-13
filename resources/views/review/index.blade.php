@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Review Paper')

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


    @endsection
