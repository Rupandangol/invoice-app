@extends('layout.header')
@section('header')
    <style>
        #body{
            height: 100vh;
            background: linear-gradient(0.5turn, #062939, #9db58a, #445fad);
            margin: auto;
            display: block;
        }
        #login{
            background-color: white;
            padding: 50px;
            text-align: center;
            box-shadow: #445fad 7px 7px;
            border-radius: 18px;
        }
    </style>
@endsection
<div id="body">
<div class="container">
    <div class="row" >
    <div class="col-md-5 offset-3 mt-5" id="login">
        @include('components.sfAlerts')
            <h1>{{__('Invoice')}} {{__('App')}}</h1>
            <h5>{{__("Login")}}</h5>
            @include('components.languagesSwitcher')
            <form method="post" action="{{route('login')}}">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control" />
                  <label class="form-label" for="email">{{__("Email")}} {{__("Address")}}</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control" />
                  <label class="form-label" for="password">{{__("Password")}}</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" name="remember_me" type="checkbox" id="remember_me" />
                      <label class="form-check-label" for="remember_me"> {{__("Remember me")}} </label>
                    </div>
                  </div>
                </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">{{__("Sign in")}}</button>
              
               
              </form>
            </div>
            
    </div>
</div></div>

@include('layout.footer')
