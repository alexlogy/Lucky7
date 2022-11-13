@extends('app')
@extends('header')
@extends('breadcrumbs')
@extends('sidebar')
@extends('footer')

@section('content')
    <div class="pull-left">
        <h2> Accept / Reject Paper</h2>
    </div>

    <table class="table table-bordered">
        <tr>
            <th> No </th>
            <th> Paper ID </th>
            <th> Paper Title </th>
            <th> Paper Content </th>
            <th> Review Details </th>
            <th> Paper Status </th>
            <th colspan="2" width="280px"> Action </th>
        </tr>

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
        <tr>
            <td> {{ $i++ }} </td>
            <td> {{ $review->pid }} </td>
            <td> {{ $review->title }} </td>
            <td> {{ $review->content }} </td>


            <?php

                $count = DB::table('reviews')
                    ->where('paper_pid', '=', $review->pid)
                    ->count();

                $reviewForPaper = DB::table('reviews as r')
                    ->where('paper_pid', '=', $review->pid)
                    ->get();
                $x = 1;
            ?>
            @if($count!=0)
            <td>
            @foreach($reviewForPaper AS $reviewForPaper)
            Reviewer: {{ $reviewForPaper->user_id }}<br> Paper Rating: {{ $reviewForPaper->paper_rating }} <br> Review: {{ $reviewForPaper->review_status }}<br><br>
            @endforeach
            </td>
            @else
            <td style="color:red">Paper has not been reviewed</td>
            @endif
            <td>{{ $review->paper_status }}</td>
            <td>
                <form action="{{ route('accept', $review->pid) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Accept</button>
                </form>
            </td>
            <td>
                <form action="{{ route('decline', $review->pid) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>
            </td>
            <td>
                <form action="{{ route('email', $review->pid) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Email Authors</button>
                </form>
            </td>
        </tr>




        @endforeach
    </table>


    @endsection
