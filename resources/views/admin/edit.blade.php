<html>
  <head><title>edit page</title></head>
  <body>
    <form action="{{ route('admin.update', 'user') }}" method="post">
        @csrf
        @method('PUT')
   
         <div>
            <div>
              <input type="text" readonly name="id" value="{{ $user->id }}" placeholder="id">
            </div>
            <div>
              <input type="text" readonly name="name" value="{{ $user->name }}" placeholder="name">
            </div>
            <div>
                <div>
                    <strong>Role:</strong>
                    <select name="type">
                      <option value="none" selected disabled hidden>Select a role</option>
                      <option value="Conference Chair">Conference Chair</option>
                      <option value="Author">Author</option>
                      <option value="Reviewer">Reviewer</option>
                      <option value="Both">Author and Reviewer</option>
                    </select>
                </div>
            </div>
            <div>
              <button type="submit">Submit</button>
            </div>
        </div>
    </form>
  </body>
</html>