<x-admin-master>

    @section('content')
        
    <div class="row">
    
        <div class="col-sm-3">
            <form method="post" action="{{ route('permissions.store') }}">                                                           
                @csrf
                    <div class="form-group">
    
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" 
                        class="form-control @error('name') is-invalid @enderror">
    
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
    
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Create Permissions</button>
            </form>
        </div>
    
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions:</h6>
                </div>
    
                @if(session()->has('delete-msg'))
                    <div class="alert alert-danger">{{ session('delete-msg') }}</div>
    
                @elseif(session()->has('update-msg'))
                <div class="alert alert-success">{{ session('update-msg') }}</div>
                
                @endif
    
                        <div class="table-responsive">
                            <table class="table table-bordered" id="authorization-permissions-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
        
                                <tbody>               
        
                                    @foreach($permissions as $permission)
        
                                        <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td><a href="{{ route('permissions.edit', $permission->id) }}">{{ $permission->name }}</a></td>
                                        <td>{{ $permission->slug }}</td>    
    
                                        <td>
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
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
                </div>
            
        
    @endsection
        
    @section('scripts')
        
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        
    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
    
    </div> 
     
@endsection
        
</x-admin-master>