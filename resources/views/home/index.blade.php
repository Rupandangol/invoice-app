@extends('layout.app')
@section('content')
<div class="bg-light">

    <div class="container " style="height: 100vh">
        <div class="py-5 text-center">
            <h2>{{__("Home")}}</h2>
            <a href="{{route('invoices.create')}}" class="btn btn-success">{{__("Create")}} {{__("Invoice")}}</a>

          </div>
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{__("Users")}}</div>
                    <div class="card-body">
                      <h5 class="card-title">{{__("Total Number of Users")}} :</h5>
                      <p class="card-text">
                        <span class="badge text-bg-success">{{__("Admin")}}</span> : {{$data['admin_count']??0}} <br>
                        <span class="badge text-bg-warning">{{__("Users")}}</span> : {{$data['user_count']??0}}
                    </p>
                    </p>
                    </div>
                  </div>
                <div class="card text-bg-warning  mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h4>{{__("Invoices")}}</h4></div>
                    <div class="card-body">
                      <h5 class="card-title">{{__("Total Number of invoices")}} : </h5>
                      <p class="card-text">
                        <span class="badge text-bg-primary">{{{__("Draft")}}}</span> : {{$data['invoice_draft_count']??0}} <br>
                        <span class="badge text-bg-info">{{__("Sent")}}</span> : {{$data['invoice_sent_count']??0}} <br>
                        <span class="badge text-bg-success">{{__("Paid")}}</span> : {{$data['invoice_paid_count']??0}} 
                      </p>
                    </div>
                  </div>
        
</div>
          
    </div>

@endsection