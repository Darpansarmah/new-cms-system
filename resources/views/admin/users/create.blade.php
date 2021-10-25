<x-admin-master>

@section('content')

<h1>Create Users</h1>

{!! Form::open(['method'=>'POST', 'action'=>'UserController@store', 'files' => true]) !!}

{{ csrf_field() }}


<div class="form-group">
        {!! Form::label('file', 'Image:') !!}
        {!! Form::file('avatar', ['class'=>'form-control col-sm-6']) !!}
    
        @error('avatar')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
        @enderror
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control col-sm-6']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control col-sm-6']) !!}
</div>

<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class'=>'form-control col-sm-6']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control col-sm-6']) !!}

    @error('password')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
        @enderror
</div>

<div class="form-group">
    {!! Form::label('confirm_password', 'Confirm Password:') !!}
    {!! Form::password('confirm_password', ['class'=>'form-control col-sm-6']) !!}

    @error('confirm_password')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
        @enderror
</div>

<div class="form-group">
    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection

@section('scripts')

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

</x-admin-master>
