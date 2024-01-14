@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>{{__("Users")}}</h2>
        <a href="{{route('users.create')}}" class="btn btn-success">{{__("Create")}} {{__("User")}}</a>
      </div>
      @include('components.sfAlerts')
      
      <div class="row">
        <table class="table table-boarded">
            <thead>
              <tr>
                <th>{{__("Id")}}</th>
                <th>{{__("Name")}}</th>
                <th>{{__("Email")}}</th>
                <th>{{__("Role")}}</th>
                <th>{{__("Action")}}</th>
              </tr>            
            </thead>
            <tbody>
              @foreach($users as $key=>$user)
              <tr>
                <td>{{++$key}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if($user->is_admin==1)
                    <code style="color: green">{{__("Admin")}}</code>
                  @else
                    <code style="color: blue">{{__("User")}}</code>
                  @endif
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-2">
                       <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning btn-sm">{{__("Edit")}}</a>
                    </div>
                    <div class="col-md-2">
                      @if(Auth::user()->id!=$user->id)
                      <form method="post" action="{{route('users.destroy',$user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">{{__("Delete")}}</button>
                      </form>
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
      {{$users->links()}}


@endsection
