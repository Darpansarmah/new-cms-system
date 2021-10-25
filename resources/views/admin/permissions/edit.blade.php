<x-admin-master>

@section('content')

<h1>Edit Permission {{ $permission->name }}</h1>

<div class="col-sm-6">
    <div class="form-group">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror"
            value="{{ $permission->name }}">

            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</div>
@endsection


</x-admin-master>