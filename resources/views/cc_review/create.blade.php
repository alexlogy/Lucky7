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
                    <select name="paper_id" class="form-control">
                        <?php
                            use Illuminate\Support\Facades\DB;
                            echo "<option value='' selected> --- Please select paper id here ---</option>";
                            $user = auth()->user();
                            $user_id = $user->id;

                            $papers = DB::table('papers')
                                        ->join('bids', 'papers.pid','=','bids.paper_pid')
                                        ->where('bids.user_id', '=', $user_id)
                                        ->where('bids.isAwarded', '=', true)
                                        ->get();

                            foreach($papers AS $papers) {
                                echo "<option value='$papers->pid '> $papers->title </option>";
                            }
                        ?>
                    </select>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Reviewer Id </strong>
                    <input type="text" name="user_id" class="form-control" value="{{ $user->id }}">
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
