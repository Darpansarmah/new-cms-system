<x-admin-master>

    @section('content')
    
  @if(session('deleted'))
    <div class="alert alert-danger">{{ session('deleted') }}</div>
  @endif

  @if(count($comments) > 0)

  <h1 class="h3 mb-4 text-gray-800">All Comments</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Details:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="comments-table" width="100%" cellspacing="0">
              
              <thead>
                <tr class="text-center">
                  <th>Id</th>    
                  <th>Commenter</th>
                  <th>Photo</th>
                  <th>Body</th>
                </tr>
              </thead>
        
              <tbody>               

            @foreach($comments as $comment)

                <tr class="text-center">
                  <td>{{ $comment->id }}</td>
                  <td>{{ $comment->author }}</td>
                  <td> <img height="40px" width="60px" src="{{ $comment->avatar }}" alt=""></td>
                  <td>{{ Str::limit($comment->body, '30', '...') }}</td>
                  <td><a href="{{ route('post', $comment->post->id) }}">View Post</a></td>
                  <td>

                  @if($comment->is_active == 1)

                    <form action="{{ route('comments.update', $comment->id) }}" method="post">
                      @csrf
                      @method('PATCH')

                      <input type="hidden" name="is_active" value="0">

                      <button type="submit" class="btn btn-info">Un-approve</button>
                    </form>

                  @else

                  <form action="{{ route('comments.update', $comment->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="is_active" value="1">

                    <button type="submit" class="btn btn-success">Approve</button>
                  </form>

                  @endif

                </td>

                  <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
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

      @else
      <h1 class="text-center">No Comments</h1>

@endif
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