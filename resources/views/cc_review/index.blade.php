@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> Approve & Decline Paper</h2>
    </div>

    <table class="table table-bordered">
        <tr>
        <th> No </th>
            <th> Paper ID </th>
            <th> Paper Title </th>
            <th> Paper Content </th>
            <th colspan="4"> Review Details </th>
            <th> Paper Status </th>
            <th colspan="2" width="280px"> Action </th>
        </tr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('review.create') }}">
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

        <?php
            use Illuminate\Support\Facades\DB;
            $i=1;
        ?>
    @foreach ($paper_reviewed as $review)
            <?php

                $count = DB::table('reviews')
                    ->where('paper_pid', '=', $review->pid)
                    ->count();

                $reviewForPaper = DB::table('reviews as r')
                    ->join('users as u', 'r.user_id', '=', 'u.id')
                    ->select('r.review_rating', 'r.paper_rating', 'u.name')
                    ->where('paper_pid', '=', $review->pid)
                    ->get();
                echo $count;
                $x = 1;
            ?>

        <tr>
            @if($count != 0)
                @foreach($reviewForPaper AS $reviewForPaper)
                    @if($i == 1)
                        <tr>
                            <td rowspan="{{ $count }}}"> {{ $i++ }} </td>
                            <td rowspan="{{ $count }}}"> {{ $review->pid }} </td>
                            <td rowspan="{{ $count }}}"> {{ $review->title }} </td>
                            <td rowspan="{{ $count }}}"> {{ $review->content }} </td>


                            <td> No: {{ $x++ }} </td>
                            <td> Paper Rating: {{ $reviewForPaper->paper_rating }}</td>
                            <td> Review Rating: {{ $reviewForPaper->review_rating }}</td>
                            <td> Reviewer: {{ $reviewForPaper->name }}</td>

                            <td rowspan="{{ $count }}}"> {{ $review->paper_status }} </td>
                            <td>
                                <form action="{{ route('accept', $review->pid) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!--<input hidden type="text" name="paper_id" value="{{ $review->pid }}">-->
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('decline', $review->pid) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!--<input hidden type="text" name="paper_id" value="{{ $review->pid }}">-->
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td> No: {{ $x++ }} </td>
                            <td> Paper Rating: {{ $reviewForPaper->paper_rating }}</td>
                            <td> Review Rating: {{ $reviewForPaper->review_rating }}</td>
                            <td> Reviewer: {{ $reviewForPaper->name }}</td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td rowspan="{{ $count }}}"> {{ $i++ }} </td>
                    <td rowspan="{{ $count }}}"> {{ $review->pid }} </td>
                    <td rowspan="{{ $count }}}"> {{ $review->title }} </td>
                    <td rowspan="{{ $count }}}"> {{ $review->content }} </td>
                    <td colspan="4"> No review yet!</td>
                    <td rowspan="{{ $count }}}"> {{ $review->paper_status }} </td>
                    <td>
                        <form action="{{ route('accept', $review->pid) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!--<input hidden type="text" name="paper_id" value="{{ $review->pid }}">-->
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('decline', $review->pid) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!--<input hidden type="text" name="paper_id" value="{{ $review->pid }}">-->
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                    </td>
                </tr>
            @endif


        @endforeach
    </table>


    @endsection
