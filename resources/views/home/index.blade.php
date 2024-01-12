@extends('layout.app')
@section('content')
<div class="bg-light">

    <div class="container " style="height: 100vh">
        <div class="py-5 text-center">
            <h2>Home</h2>
            <a href="{{route('invoices.create')}}" class="btn btn-success">Create Invoice</a>

          </div>
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                      <h5 class="card-title">Total Number of Users :</h5>
                      <p class="card-text">
                        <span class="badge text-bg-success">Admin</span> : {{$data['admin_count']??0}} <br>
                        <span class="badge text-bg-warning">Users</span> : {{$data['user_count']??0}}
                    </p>
                    </p>
                    </div>
                  </div>
                <div class="card text-bg-warning  mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h4>Invoices</h4></div>
                    <div class="card-body">
                      <h5 class="card-title">Total Number of invoices : </h5>
                      <p class="card-text">
                        <span class="badge text-bg-primary">Draft</span> : {{$data['invoice_draft_count']??0}} <br>
                        <span class="badge text-bg-info">Sent</span> : {{$data['invoice_sent_count']??0}} <br>
                        <span class="badge text-bg-success">Paid</span> : {{$data['invoice_paid_count']??0}} 
                      </p>
                    </div>
                  </div>
        
</div>
          
    </div>

@endsection