<x-admin-master>

@section('content')

<h1>Edit Role: {{ $role->name }}</h1>
        
<div class="row">
        <div class="col-sm-3 mt-4">
            <form method="post" action="{{ route('roles.update', $role->id) }}">                                                           
                @csrf
                @method('PUT')

                    <div class="form-group">
    
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" 
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ $role->name }}">
    
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
    
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
    </div>

           
       
    <div class="row">
        <div class="col-lg-12 mt-4">

            @if($permissions->isNotEmpty())

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions:</h6>
                </div>
    
                {{-- @if(session()->has('delete-msg'))
                    <div class="alert alert-danger">{{ session('delete-msg') }}</div>
    
                @elseif(session()->has('update-msg'))
                <div class="alert alert-success">{{ session('update-msg') }}</div> --}}
                
                {{-- @endif --}}
                        <div class="table-responsive">
                            <table class="table table-bordered" id="authorization-roles-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
        
                                <tbody>               
        
                                    @foreach($permissions as $permission)
        
                                        <tr>
                                        <td><input type="checkbox"
                                            @foreach($role->permissions as $role_p)
                                                @if($role_p->slug == $permission->slug)
                                                    checked
                                                @endif
                                            @endforeach>
                                        </td>        
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        
                                        <td>
                                            <form action="{{ route('roles.permissions.attach', $role) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="permission" value="{{ $permission->id }}">
                                            <button class="btn btn-primary"
                                            @if($role->permissions->contains($permission)) disabled @endif>Attach</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('roles.permissions.detach', $role) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" name="permission" value="{{ $permission->id }}">
                                            <button class="btn btn-danger"
                                            @if(!$role->permissions->contains($permission)) disabled @endif>Detach</button>
                                            </form>
                                        </td>

                                        </tr>
                                
                                    @endforeach
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif           
            </div>
        </div>
                   
@endsection

@section('scripts')
    
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    
{{-- <!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}

@endsection

</x-admin-master>