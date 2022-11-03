<html>
  <head><title>admin page</title></head>
  <body>
    <table>
          <tr>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Type</th>
              <th width="280px">Action</th>
          </tr>
          @foreach ($users as $user)
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->password }}</td>
              <td>{{ $user->type }}</td>
              <td>
                <form action="{{ route('admin.destroy', $user) }}" method="post">
    
                    <a href="{{ route('admin.edit', $user) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
      </table>
  </body>

</html>