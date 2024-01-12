@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Users</h2>
        <a href="{{route('users.create')}}" class="btn btn-success">Create User</a>
      </div>
      @include('components.sfAlerts')
      
      <div class="row">
        <table class="table table-boarded">
            <thead>
              <tr>
                <th>Sn</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>            
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if($user->is_admin==1)
                    <code style="color: green">Admin</code>
                  @else
                    <code style="color: blue">User</code>
                  @endif
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-2">
                       <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                    <div class="col-md-2">
                      <form method="post" action="{{route('users.destroy',$user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
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
