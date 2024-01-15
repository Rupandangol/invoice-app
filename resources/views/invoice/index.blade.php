@extends('layout.app')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2>{{__("Invoice")}}</h2>
        <a href="{{route('invoices.create')}}" class="btn btn-success">{{__("Create")}} {{__("Invoice")}}</a>
      </div>
      @include('components.sfAlerts')
      
      <div class="row">
        <table class="table table-boarded">
            <thead>
              <tr>
                <th>{{__("Id")}}</th>
                <th>{{__("User")}} {{__("Id")}}</th>
                <th>{{__("Client Name")}}</th>
                <th>{{__("Invoice Date")}}</th>
                <th>{{__("Due Date")}}</th>
                <th>{{__("Status")}}</th>
                <th>{{__("Action")}}</th>
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
                <td>
                      @if($item->status=='draft') <span>{{__("Draft")}}</span> @endif 
                      @if($item->status=='sent') <span>{{__("Sent")}}</span> @endif 
                     @if($item->status=='paid') <span>{{__("Paid")}}</span> @endif 
                </td>

                <td>
                  <div class="row">
                    <div class="col-md-3">
                       <a href="{{route('invoices.show',$item->id)}}" class="btn btn-info btn-sm">{{__("Details")}}</a>
                    </div>
                    <div class="col-md-2">
                       <a href="{{route('invoices.edit',$item->id)}}" class="btn btn-warning btn-sm">{{__("Edit")}}</a>
                    </div>
                    <div class="col-md-3">
                       <a href="{{route('invoices.download',$item->id)}}" target="_blank" class="btn btn-success btn-sm">{{__("Download")}}</a>
                    </div>
                    <div class="col-md-2">
                      <form method="post" action="{{route('invoices.destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">{{__("Delete")}}</button>
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
