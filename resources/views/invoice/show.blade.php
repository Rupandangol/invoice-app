@extends('layout.app')

@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Invoice Show</h2>
        <a class="btn btn-info btn-sm" href="{{route('invoices.index')}}">Back</a>
        <a target="_blank" class="btn btn-success btn-sm" href="{{route('invoices.download',$invoice->id)}}">Download</a>
      </div>
      @include('components.sfAlerts')

      <div class="row">
        <div class="col-md-10">
          <table class="table table-boarded">
            <thead>
              <tr>
                <th>Last Billed Amount</th>
                <th>Deposit Amount</th>
                <th>Carryover Amount</th>
                <th>Purchase Amount</th>
                <th>comsumption Amount</th>
                <th>Purchase Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$invoice->last_billed_amount}}</td>
                <td>{{$invoice->deposit_amount}}</td>
                <td>{{$invoice->last_billed_amount-$invoice->deposit_amount}}</td>
                <td>{{$invoice->data['sub_total']}}</td>
                <td>{{$invoice->data['taxed_only']}}</td>
                <td>{{$invoice->data['taxed_sub_total']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2">
          <table class="table table-boarded">
            <thead>
              <tr>
                <th>Current billable amount</th>
              </tr>
              <tr>
                <td>{{$invoice->data['taxed_sub_total']+($invoice->last_billed_amount-$invoice->deposit_amount)}}</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    
      <div class="row">
        <table class="table table-boarded">
            <thead>
              <tr>
                <th>Sn</th>
                <th>Document Date</th>
                <th>Slip No</th>
                <th>Product Name</th>
                <th>Product Number</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Amount</th>
              </tr>            
            </thead>
            <tbody>
              @foreach($invoice->invoiceItem as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->document_date}}</td>
                <td>{{$item->slip_no}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_number}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->unit_price}}</td>
                <td>{{$item->unit_price * $item->quantity}}</td>
              </tr>
              @endforeach
              <tr>
                <td colspan="7" align="right">sub-total :</td>
                <td>{{$invoice->data['sub_total']}}</td>
              </tr>
              <hr>
              <tr>
                
                <td colspan="7" align="right">{{config('tax.vat')}} % Vat :</td>
                <td>{{$invoice->data['taxed_only']}}</td>
              </tr>
              <tr>
                <td colspan="7" align="right">total : </td>
                <td>{{$invoice->data['taxed_sub_total']}}</td>
              </tr>
            </tbody>
        </table>
      </div>

@endsection
