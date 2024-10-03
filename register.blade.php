@extends('layout')
@section('title', 'register') 
@section('content')
<style>
       

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
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


        .form-container button {
        background-color: #088F8F;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        margin-right: 10px;
        margin-top: 10px;
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

        .form-container p {
            text-align: center;
        }

        .form-container p a {
            color: #088F8F;
            text-decoration: none;
            margin-left: 5px;
        }

        .form-container p a:hover {
            text-decoration: underline;
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

    <form  action="{{route('register.post')}}" method="POST">
        @csrf
 
    <input type="text" name="name" placeholder="Full Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="nid" placeholder="National ID"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>
    <p>SELECT ROLE</p>
    <select name="role">
        <option value="">ROLE</option>
        <option value="admin">Admin</option>
        <option value="driver">Driver</option>
        <option value="mechanic">Mechanic</option>
    </select>
    <button type="submit" name="register" class="form-btn">Register Now</button>
    </form>
    <p>Already have an account.<a href="login">login</a></p>


@endsection