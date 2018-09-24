@extends('layouts.app')
@section('style')
<style>
    .responsive {
        align-content: center;
        width: 50%;
        height: auto;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <div class="col-md-6 offset-3 text-center">
                        <img src="{{ asset("img/userimg.png") }}" class="rounded-circle responsive" alt="User Image">
                        <h3>{{ Auth::user()->name}}</h3>
                        <p class="text-muted">
                            {{ Auth::user()->email}}
                            <br>
                            Phone: {{ Auth::user()->phone}}
                        </p>
                    </div>
                    <form action="{{ action("DashboardController@update") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
