@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Edit Paper')

@section('content')
    <!-- start: page -->
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
                    <form action="{{ route('paper.update', $paper->pid) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row pb-4">
                            <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDisabled">Title</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="title" type="text" name="title" value="{{ $paper->title }}">
                            </div>
                        </div>

                        <div class="form-group row pb-4">
                            <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Content</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="content" name="content" value="{{ $paper->content }}">
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <div class="col-lg-3">

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="mb-1 mt-1 me-1 btn btn-primary"><i class="fas fa-pen-nib"></i> Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
