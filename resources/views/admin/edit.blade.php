@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Edit User')

@section('content')
    <form action="{{ route('admin.update', 'user') }}" method="post">
        @csrf
        @method('PUT')
   
         <div>
            <div>
              <label for="user_id">User ID</label>
              <input type="text" readonly id="user_id" name="id" value="{{ $user->id }}" placeholder="id">
            </div>
            <div>
              <label for="user_name">User Name</label>
              <input type="text" readonly id="user_name" name="name" value="{{ $user->name }}" placeholder="name">
            </div>
            <div>
              <label for="user_type">User Role</label>
              <input type="text" readonly id="user_type" name="name" value="{{ $user->type }}" placeholder="Currently Unassigned">
            </div>
            <div>
                <div>
                    <strong>Role:</strong>
                    <select name="type">
                      <option value="none" selected disabled hidden>Change Role</option>
                      <option value="Conference Chair">Conference Chair</option>
                      <option value="Author">Author</option>
                      <option value="Reviewer">Reviewer</option>
                      <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
            <div>
              <button type="submit">Change</button>
            </div>
        </div>
    </form>
@endsection