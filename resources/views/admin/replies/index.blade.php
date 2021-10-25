<x-admin-master>

    @section('content')
    
    <h1 class="h3 mb-4 text-gray-800">All Replies</h1>

    {{-- @if(session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Details:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
              <thead>
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
                  <td>{{ $user->id }}</td>
                  <td><a href="{{ route('users.profile.show', $user->id) }}">{{ $user->username }}</a></td>
                  <td>{{ $user->name }}</td>
                  <td> <img height="40px" width="60px" src="{{ $user->avatar }}" alt=""></td>
                  <td>{{ $user->email }}</td>    
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                  <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
        </div>
      </div>


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
 
    @endsection
    
    </x-admin-master>