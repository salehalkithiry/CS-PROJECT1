@extends('layout')
@section('title', 'Login')
@section('content')
<style>
    
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(8, 88, 88, 8.1);
        padding: 20px;
        border-radius: 5px;
        height: 60vh;
        margin: 9;
        margin-top: 50px;
    }
    .form-container button {
        background-color: #088F8F;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        margin-right: 10px;
        margin-top: -50px;
    }
    .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container select {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
    .form-container button a {
        color: white;
        text-decoration: none;
    }
    .form-container button[type="submit"] {
        float: right;
    }
    .form-container button[type="submit"]:hover {
        background-color: #077F7F;
    }
</style>
<div class="mt-1">
        @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif
        
        @if (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">{{session('success')}}</div>
        @endif

    </div>
<div class="form-container">

    <form action="{{ route('login.post') }}" method="POST">
@csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="" placeholder="">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="" placeholder="">
        </div>
        <div class="mb-3">
            <label>Select a role</label><br>
            <select name="role">
                <option value="">ROLE</option>
                <option value="admin">Admin</option>
                <option value="driver">Driver</option>
                <option value="mechanic">Mechanic</option>
            </select>
        </div>
        <p>Don't have an account? <a href="register">Register</a></p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection



