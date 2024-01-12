@extends('layout.app')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2>Invoice</h2>
        <a href="{{route('invoices.create')}}" class="btn btn-success">Create Invoice</a>
      </div>
      @include('components.sfAlerts')
      
      <div class="row">
        <table class="table table-boarded">
            <thead>
              <tr>
                <th>Sn</th>
                <th>User Id</th>
                <th>Client Name</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
                <th>Total amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>            
            </thead>
            <tbody>
              @foreach($invoices as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->client_name}}</td>
                <td>{{$item->invoice_date}}</td>
                <td>{{$item->due_date}}</td>
                <td>{{$item->total_amount}}</td>
                <td>{{$item->status}}</td>
                <td>
                  <div class="row">
                    <div class="col-md-3">
                       <a href="{{route('invoices.show',$item->id)}}" class="btn btn-info btn-sm">Details</a>
                    </div>
                    <div class="col-md-2">
                       <a href="{{route('invoices.edit',$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                    <div class="col-md-2">
                      <form method="post" action="{{route('invoices.destroy',$item->id)}}">
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
        {{$invoices->links()}}

      </div>

@endsection
