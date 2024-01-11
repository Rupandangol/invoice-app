@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Users</h2>
      </div>
      @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
      @endif
      @if(session('fail'))
      <div class="alert alert-danger">
        {{session('fail')}}
      </div>
      @endif
          <h4 class="mb-3">Create User</h4>
          <form method="post" action="{{route('users.store')}}" >
            @csrf
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" name="name" value="{{old('name')??''}}" class="form-control" id="username" placeholder="Username" >
              </div>
              @if($errors->has('name'))
              <div>
                  <code>{{$errors->first('name')}}</code>
              </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')??''}}" class="form-control" id="email" placeholder="Email" >
            </div>
            @if($errors->has('email'))
              <div>
                  <code>{{$errors->first('email')}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="role">Role</label>
              <select class="form-select" name="is_admin" aria-label="Default select example">
                <option @if(old('is_admin')==1) selected @endif value="1">Admin</option>
                <option @if(old('is_admin')==0) selected @endif value="0">User</option>
              </select>
            </div>
            @if($errors->has('is_admin'))
              <div>
                  <code>{{$errors->first('is_admin')}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
            </div>
            @if($errors->has('password'))
              <div>
                  <code>{{$errors->first('password')}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password" >
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="{{route('users.index')}}" class="btn btn-info btn-outline">Back</a>

          </form>

@endsection
