<x-admin-master>

@section('content')

  @if(count($replies) > 0)

  <h1 class="h3 mb-4 text-gray-800">Replies</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Details:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="replies-table" width="100%" cellspacing="0">
              
              <thead>
                <tr class="text-center">
                  <th>Id</th>    
                  <th>Commenter</th>
                  <th>Photo</th>
                  <th>Body</th>
                </tr>
              </thead>
        
              <tbody>               

            @foreach($replies as $reply)

                <tr class="text-center">
                  <td>{{ $reply->id }}</td>
                  <td>{{ $reply->author }}</td>
                  <td> <img height="40px" width="60px" src="{{ $reply->avatar }}" alt=""></td>
                  <td>{{ Str::limit($reply->body, '30', '...') }}</td>
                  <td><a href="{{ route('post', $reply->comment->post->id) }}">View Post</a></td>
                  <td>

                  @if($reply->is_active == 1)

                    <form action="{{ route('replies.update', $reply->id) }}" method="post">
                      @csrf
                      @method('PATCH')

                      <input type="hidden" name="is_active" value="0">

                      <button type="submit" class="btn btn-info">Un-approve</button>
                    </form>

                  @else

                  <form action="{{ route('replies.update', $reply->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="is_active" value="1">

                    <button type="submit" class="btn btn-success">Approve</button>
                  </form>

                  @endif

                </td>

                  <td>
                    <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
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
      <h1 class="text-center">No Replies</h1>

@endif
    
@endsection

@section('scripts')

    <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
 
@endsection
    
</x-admin-master>