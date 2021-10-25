<x-admin-master>

    @section('content')

    <h1>All Posts</h1>

    @if(Session::has('msg'))
    
        <div class="alert alert-danger">{{ Session::get('msg') }}</div>

    @elseif(Session::has('postcreate-message'))

        <div class="alert alert-success">{{ Session::get('postcreate-message') }}</div>

    @elseif(Session::has('update-msg'))

    <div class="alert alert-success">{{ Session::get('update-msg') }}</div>    

    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Post Title</th>
                  <th>Post</th>
                  <th>Post Image</th>
                  <th>Post By</th>
                  <th>Comments</th>
                  <th>Created</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Post Title</th>
                  <th>Post</th>
                  <th>Post Image</th>
                  <th>Post By</th>
                  <th>Comments</th>
                  <th>Created</th>
                  <th>Delete</th>  
                </tr>
              </tfoot>
              <tbody>               

            @foreach($posts as $post)

                <tr>
                  <td>{{ $post->id }}</td>
                  <td><a href="{{ route('posts.edit', $post->id) }}">{{ Str::limit($post->title, 30, '...') }}</a></td>
                  <td><a href="{{ route('post', $post->id) }}">View Post</a></td>
                  <td> <img height="40px" width="100px" src="{{ $post->post_image }}" alt=""></td>
                  <td>{{ $post->user->name }}</td>
                  <td><a href="{{ route('comments.show', $post->id) }}">View Comments</a></td>    
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
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
    {{ $paginate->links() }}
        </div>
    </div> --}}

    {{-- <div class="d-flex">
        <div class="mx-auto">
    {{ $posts->render() }}
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