@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection 
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>

@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"> 
            All Users <a href="./register" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Level</th>
                            <th>Status</th>
                            <th>Change Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row['name']}}</td>
                                    <td>{{$row['email']}}</td>
                                    <td>{{$row['phone']}}</td>
                                    <td>
                                        {{Form::open(['action' => ['AdminController@update', $row['id']], 'method' => 'POST'])}}
                                        {{ Form::hidden('_method', 'PUT', ['class' => 'sr-only']) }}
                                        <div class="input-group input-group-sm">
                                            {{ Form::select('role', ['user' => 'User', 'manager' => 'Manager', 'admin' => 'Admin'], $row['role'], ['class' => 'form-control form-control-sm col-md-6', 'required' => 'required', 'placeholder' => 'Select User Role']) }}
                                            <div class="input-group-append">
                                                {{Form::submit('Go', ['class' =>'btn btn-sm btn-success'])}}
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                    </td>
                                    <td>
                                        {{Form::open(['action' => ['AdminController@update', $row['id']], 'method' => 'POST'])}}
                                        {{ Form::hidden('_method', 'PUT', ['class' => 'sr-only']) }}
                                        <div class="input-group input-group-sm">
                                            {{ Form::select('isActive', [0 => 'N', 1 => 'Y'], $row['isActive'], ['class' => 'form-control form-control-sm col-md-6', 'required' => 'required', 'placeholder' => 'User Status']) }}
                                            <div class="input-group-append">
                                                {{Form::submit('Go', ['class' =>'btn btn-sm btn-success'])}}
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                    </td>
                                    <td>
                                        {{Form::open(['action' => ['AdminController@update', $row['id']], 'method' => 'POST'])}}
                                        {{ Form::hidden('_method', 'PUT', ['class' => 'sr-only']) }}
                                        <div class="input-group input-group-sm">
                                            {{ Form::text('password', null, ['class' => 'form-control form-control-sm col-md-6', 'required' => 'required', 'placeholder' => 'Password']) }}
                                            <div class="input-group-append">
                                                {{Form::submit('Go', ['class' =>'btn btn-sm btn-success'])}}
                                            </div>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                    </td>
                                    <td>
                                            {{Form::open(['action' => ['AdminController@destroy', $row->id], 'method' => 'POST'])}}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' =>'btn btn-sm btn-danger', 'onclick'=>"return confirm('Are you sure?')"])}}
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                            @endforeach
                        @else
                            <tr><th>No Data Found</th></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
