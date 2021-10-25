<x-admin-master>

    @section('content')
    
    <h1 class="h3 mb-4 text-gray-800">All Users</h1>

    @if(session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
    @endif



    <form action="{{ route('users.delete') }}" method="post" class="form-inline">
      @csrf
      @method('DELETE')

      <div class="form-group">

        <select name="checkBoxArray" id="" class="form-control">
          <option value="">Delete</option>
        </select>

      </div>
      
      <div class="form-group">
        <input type="submit" name="delete_bulk" class="btn btn-primary">
      </div>


    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Details:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th><input type="checkbox" id="options"></th>
                  <th>Id</th>
                  <th>Profile Username</th>
                  <th>Name</th>
                  <th>Avatar</th>
                  <th>Email</th>
                  <th>User Registered</th>
                  <th>Info Updated</th>
                  <th>Delete User</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Profile Username</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>User Registered</th>
                    <th>Info Updated</th>
                    <th>Delete User</th>
                </tr>
              </tfoot>
              <tbody>               

            @foreach($users as $user)

                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $user->id }}"></td>
                  <td>{{ $user->id }}</td>
                  <td><a href="{{ route('users.profile.show', $user->id) }}">{{ $user->username }}</a></td>
                  <td>{{ $user->name }}</td>
                  <td> <img height="40px" width="60px" src="{{ $user->avatar }}" alt=""></td>
                  <td>{{ $user->email }}</td>    
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                  <td>
                    <input type="hidden" name="user" value="{{ $user->id }}">

                    <div class="form-control">
                      <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                    </div>
                  </td>
                  </tr>
                        
                @endforeach
                    
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </form>

    {{-- <div class="d-flex">
        <div class="mx-auto">
    {{ $posts->links() }}
        </div>
    </div> --}}
    
  @endsection

  @section('scripts')

    <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

  <script>

    $(document).ready(function() {

      $('#options').click(function() {
        if(this.checked) {
          $('.checkBoxes').each(function() {
            this.checked = true;
          });
        } else {
          $('.checkBoxes').each(function() {
            this.checked = false;
          });
        }
      });

    });

  </script>
 
  @endsection
    
  </x-admin-master>