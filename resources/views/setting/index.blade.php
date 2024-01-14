@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>{{__("Setting")}}</h2>
      </div>
     
      @include('components.sfAlerts')
      <div class="row">
        <form method="post" action="{{route('settings.store')}}">
          @csrf
          <div class="form-group">
            <label for="name">{{__("Company")}} {{__("Name")}}</label>
            <input type="text" name="name" value="{{$company->name??''}}" class="form-control" id="name" aria-describedby="name" placeholder="{{__("Company")}} {{__("Name")}}">
            @if($errors->has('name'))
                <code style="color: red">{{$errors->first('name')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="description">{{__("Description")}}</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$company->description??''}}</textarea>
            @if($errors->has('description'))
              <code style="color: red">{{$errors->first('description')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="location">{{__("Address")}}</label>
            <input type="text" name="location" class="form-control" id="location" value="{{$company->location??''}}" aria-describedby="location" placeholder="{{__("Address")}}">
            @if($errors->has('location'))
             <code style="color: red">{{$errors->first('location')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="phone">{{__("Phone")}} {{__("Number")}}</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{$company->phone??''}}" aria-describedby="phone" placeholder="{{__("Phone")}} {{__("Number")}}">
            @if($errors->has('phone'))
              <code style="color: red">{{$errors->first('phone')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="fax">{{__("Fax")}} {{__("Number")}}</label>
            <input type="text" name="fax" class="form-control" id="fax" value="{{$company->fax??''}}" aria-describedby="fax" placeholder="{{__("Fax")}} {{__("Number")}}">
            @if($errors->has('fax'))
              <code style="color: red">{{$errors->first('fax')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="registration_number">{{__("Registration")}} {{__("Number")}}</label>
            <input type="text" name="registration_number" class="form-control" value="{{$company->registration_number??''}}" id="registration_number" aria-describedby="registration_number" placeholder="{{__("Registration")}} {{__("Number")}}">
            @if($errors->has('registration_number'))
             <code style="color: red">{{$errors->first('registration_number')}}</code>
            @endif
          </div>
          <br>
          <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
        </form>
      </div>


@endsection
