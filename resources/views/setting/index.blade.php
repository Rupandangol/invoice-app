@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Setting</h2>
      </div>
     
      @include('components.sfAlerts')
      <div class="row">
        <form method="post" action="{{route('settings.store')}}">
          @csrf
          <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" name="name" value="{{$company->name??''}}" class="form-control" id="name" aria-describedby="name" placeholder="Company Name">
            @if($errors->has('name'))
                <code style="color: red">{{$errors->first('name')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$company->description??''}}</textarea>
            @if($errors->has('description'))
              <code style="color: red">{{$errors->first('description')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="location">Address</label>
            <input type="text" name="location" class="form-control" id="location" value="{{$company->location??''}}" aria-describedby="location" placeholder="Address">
            @if($errors->has('location'))
             <code style="color: red">{{$errors->first('location')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{$company->phone??''}}" aria-describedby="phone" placeholder="Company Name">
            @if($errors->has('phone'))
              <code style="color: red">{{$errors->first('phone')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="fax">Fax Number</label>
            <input type="text" name="fax" class="form-control" id="fax" value="{{$company->fax??''}}" aria-describedby="fax" placeholder="Company Name">
            @if($errors->has('fax'))
              <code style="color: red">{{$errors->first('fax')}}</code>
            @endif
          </div>
          <div class="form-group">
            <label for="registration_number">Registration Number</label>
            <input type="text" name="registration_number" class="form-control" value="{{$company->registration_number??''}}" id="registration_number" aria-describedby="registration_number" placeholder="Company Name">
            @if($errors->has('registration_number'))
             <code style="color: red">{{$errors->first('registration_number')}}</code>
            @endif
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>


@endsection
