@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'View Papers')

@section('content')
{{--    <div class="pull-left">--}}
{{--        <h2> View papers </h2>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-success" href="{{ route('paper.create') }}">--}}
{{--                    Create New Paper--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @if($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <table class="table table-bordered">--}}
{{--        <tr>--}}
{{--            <th> No </th>--}}
{{--            <th> Title </th>--}}
{{--            <th> Content </th>--}}
{{--            <th width="280px"> Action </th>--}}
{{--        </tr>--}}

{{--    @foreach ($paper as $paper)--}}
{{--        <tr>--}}
{{--           <td> {{ $i++ }} </td>--}}
{{--            <td> {{ $paper->title }} </td>--}}
{{--            <td> {{ $paper->content }} </td>--}}
{{--            <td>--}}
{{--                <form action="{{ route('paper.destroy', $paper->pid) }}" method="POST">--}}
{{--                    <a class="btn btn-info" href="{{ route('paper.show', $paper->pid) }}">--}}
{{--                        Show--}}
{{--                    </a>--}}

{{--                    <a class="btn btn-primary" href="{{ route('paper.edit', $paper->pid) }}">--}}
{{--                        Edit--}}
{{--                    </a>--}}

{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                </form>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
    <!-- Start of Content -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('paper.create') }}">
                    Create New Paper
                </a>
            </div>
        </div>
    </div>
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
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($paper as $paper)
                            <tr>
                                <td>{{ $paper->pid }}</td>
                                <td>{{ $paper->title }}</td>
                                <td>{{ $paper->content }}</td>
                                <td>{{ $paper->paper_status}}</td>
                                <!-- Actions -->
                                <td>
                                    <form action="{{ route('paper.destroy', $paper->pid) }}" method="POST">
                                        <a href="{{ route('paper.edit', $paper->pid) }}" class="mb-1 mt-1 me-1 btn btn-primary n-default edit-row"><i class="fas fa-pencil-alt"></i></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <!-- End of Content -->
@endsection
