@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Edit User')

@section('content')
    <!-- start: page -->
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
                    <form action="{{ route('admin.update', 'user') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row pb-4">
                            <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDisabled">User ID</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="user_id" name="id" type="text" value="{{ $user->id }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row pb-4">
                            <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">User Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="user_name" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2">User Role</label>
                            <div class="col-lg-6">
                                <select data-plugin-selectTwo class="form-control populate" name="type" id="type">
                                    <optgroup label="User Roles">
                                        <option value="Author" {{ ($user->type == 'Author') ? 'selected' : '' }}>Author</option>
                                        <option value="Reviewer" {{ ($user->type == 'Reviewer') ? 'selected' : '' }}>Reviewer</option>
                                        <option value="Conference Chair" {{ ($user->type == 'Conference Chair') ? 'selected' : '' }}>Conference Chair</option>
                                        <option value="Admin" {{ ($user->type == 'Admin') ? 'selected' : '' }}>Admin</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <div class="col-lg-3">

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="mb-1 mt-1 me-1 btn btn-danger"><i class="fas fa-pen-nib"></i> Change Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
