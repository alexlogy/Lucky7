@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Bid Papers')

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                    </div>

                    <h2 class="card-title">@yield('title')</h2>
                </header>
                <div class="card-body">
                    <!-- Alerts Block -->
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                        </div>
                    @elseif($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- End of Alerts Block -->
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr>
                            <th>Paper ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Reviewer(s)</th>
                            <th>Bid</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($paper as $paper)
                            <tr>
                                <td>{{ $paper->pid }}</td>
                                <td>{{ $paper->title }}</td>
                                <td>{{ $paper->content }}</td>
                                <td>{{ $paper->user_id }}</td>
                                <!-- Actions -->
                                <form action="{{ route('bid.store') }}" method="POST">
                                    <input type="hidden" name="paper_id" value="{{ $paper->pid }}">
                                    <input type="hidden" name="user_id" value="{{ $paper->pid }}">
                                <td>
                                    <input type="checkbox" required id="bid_status" name="bid_status" value="TRUE"> <label for="bid_status">Check to Bid</label>
                                </td>
                                <td>
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger">Bid</button>
                                </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <form action="{{ route('change', $user_id) }}" method="POST">
                  <input type="hidden" name="id" value="{{ $user_id }}">
                  <label>Current review limit: {{ $user_limit_no }}</label><br>
                  <label for="limit">Set new limit:</label><br>
                  <input type="text" id="limit" name="max_review_no">
                  @csrf
                  @method('POST')

                  <input type="submit" value="set">

                </form>
            </section>
        </div>
    </div>
@endsection
