@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Edit User')

@section('content')
{{--    <form action="{{ route('admin.update', 'user') }}" method="post">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--         <div>--}}
{{--            <div>--}}
{{--              <label for="user_id">User ID</label>--}}
{{--              <input type="text" readonly id="user_id" name="id" value="{{ $user->id }}" placeholder="id">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--              <label for="user_name">User Name</label>--}}
{{--              <input type="text" readonly id="user_name" name="name" value="{{ $user->name }}" placeholder="name">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--              <label for="user_type">User Role</label>--}}
{{--              <input type="text" readonly id="user_type" name="name" value="{{ $user->type }}" placeholder="Currently Unassigned">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <div>--}}
{{--                    <strong>Role:</strong>--}}
{{--                    <select name="type">--}}
{{--                      <option value="none" selected disabled hidden>Change Role</option>--}}
{{--                      <option value="Conference Chair">Conference Chair</option>--}}
{{--                      <option value="Author">Author</option>--}}
{{--                      <option value="Reviewer">Reviewer</option>--}}
{{--                      <option value="Both">Author and Reviewer</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--              <button type="submit">Change</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

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
