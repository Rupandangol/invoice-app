@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>{{__("Users")}}</h2>
      </div>
      @include('components.sfAlerts')

          <h4 class="mb-3">{{__("Create")}} {{__("User")}}</h4>
          <form method="post" action="{{route('users.store')}}" >
            @csrf
            <div class="mb-3">
              <label for="username">{{__("Username")}}</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" name="name" value="{{old('name')??''}}" class="form-control" id="username" placeholder="{{__("Username")}}" >
              </div>
              @if($errors->has('name'))
              <div>
                  <code>{{__($errors->first('name'))}}</code>
              </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="email">{{__("Email")}}</label>
                <input type="email" name="email" value="{{old('email')??''}}" class="form-control" id="email" placeholder="{{__("Email")}}" >
            </div>
            @if($errors->has('email'))
              <div>
                  <code>{{__($errors->first('email'))}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="role">{{__("Role")}}</label>
              <select class="form-select" name="is_admin" aria-label="Default select example">
                <option @if(old('is_admin')==1) selected @endif value="1">{{__("Admin")}}</option>
                <option @if(old('is_admin')==0) selected @endif value="0">{{__("User")}}</option>
              </select>
            </div>
            @if($errors->has('is_admin'))
              <div>
                  <code>{{__($errors->first('is_admin'))}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="password">{{__("Password")}}</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="{{__("password")}}" >
            </div>
            @if($errors->has('password'))
              <div>
                  <code>{{__($errors->first('password'))}}</code>
              </div>
              @endif
            <div class="mb-3">
              <label for="password_confirmation">{{__("Confirm")}} {{__("Password")}}</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="{{__("Confirm")}} {{__("password")}}" >
            </div>
            <button class="btn btn-primary" type="submit">{{__("Create")}}</button>
            <a href="{{route('users.index')}}" class="btn btn-info btn-outline">{{__("Back")}}</a>

          </form>

@endsection
