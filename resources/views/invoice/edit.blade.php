@extends('layout.app')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection
@section('content')
<body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>{{__("Invoice")}}</h2>
      </div>
      @include('components.sfAlerts')
          <h4 class="mb-3">{{__("Edit")}} {{__("Invoice")}}</h4>
          <form method="post" action="{{route('invoices.update',$invoice->id)}}" >
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="client_name">{{__("Client Name")}}</label>
                  <input type="text" name="client_name" value="{{$invoice->client_name??''}}" class="form-control" id="client_name" placeholder="{{__("Client Name")}}" >
                </div>
                @if($errors->has('client_name'))
                  <div>
                      <code>{{__($errors->first('client_name'))}}</code>
                  </div>
                @endif
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="invoice_date">{{__("Invoice Date")}}</label>
                  <input type="date" name="invoice_date" value="{{$invoice->invoice_date??''}}" class="form-control" id="invoice_date" >
                </div>
                @if($errors->has('invoice_date'))
                  <div>
                      <code>{{__($errors->first('invoice_date'))}}</code>
                  </div>
                @endif
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="due_date">{{__("Due Date")}}</label>
                  <input type="date" name="due_date" value="{{$invoice->due_date??''}}" class="form-control" id="due_date" >
                </div>
                @if($errors->has('due_date'))
                  <div>
                    <code>{{__($errors->first('due_date'))}}</code>
                  </div>
                @endif
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="last_billed_amount">{{__("Last billed amount")}}</label>
                  <input type="number" name="last_billed_amount" value="{{$invoice->last_billed_amount??''}}" class="form-control" id="last_billed_amount" >
                </div>
                @if($errors->has('last_billed_amount'))
                  <div>
                    <code>{{__($errors->first('last_billed_amount'))}}</code>
                  </div>
                @endif
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="deposit_amount">{{__("Deposit amount")}}</label>
                  <input type="number" name="deposit_amount" value="{{$invoice->deposit_amount??''}}" class="form-control" id="deposit_amount" >
                </div>
                @if($errors->has('deposit_amount'))
                  <div>
                    <code>{{__($errors->first('deposit_amount'))}}</code>
                  </div>
                @endif
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="status">{{__("Status")}}</label>
                  <select class="form-select" name="status">
                    <option @if($invoice->status=='draft') selected @endif value="draft">Draft</option>
                    <option @if($invoice->status=='sent') selected @endif value="sent">Sent</option>
                    <option @if($invoice->status=='paid') selected @endif value="paid">Paid</option>
                  </select>
                </div>
                @if($errors->has('status'))
                  <div>
                      <code>{{__($errors->first('status'))}}</code>
                  </div>
                @endif
              </div>
            </div>
            <hr>

            <div class="myBody">
                <h4>{{__("Invoice")}} {{__("Items")}}</h4>
                @forelse (old('product_name')??[] as $key=>$item)
                        <div class="row appendItem">
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label>{{__("Product Name")}}</label>
                              <input type="text" value="{{old('product_name')[$key]??''}}" name="product_name[]" class="form-control"  >
                            </div>
                            @if($errors->has('product_name.'.$key))
                              <div>
                                <code>{{$errors->first('product_name.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="product_number">{{__("Product Number")}}</label>
                              <input type="number" value="{{old('product_number')[$key]??''}}" name="product_number[]"  class="form-control"  >
                            </div>
                            @if($errors->has('product_number.'.$key))
                              <div>
                                <code>{{$errors->first('product_number.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="slip_no">{{__("Slip No")}}</label>
                              <input type="number" value="{{old('slip_no')[$key]??''}}" name="slip_no[]"  class="form-control"  >
                            </div>
                            @if($errors->has('slip_no.'.$key))
                              <div>
                                <code>{{$errors->first('slip_no.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="document_date">{{__("Document Date")}}</label>
                              <input type="date" value="{{old('document_date')[$key]??''}}" name="document_date[]"  class="form-control"  >
                            </div>
                            @if($errors->has('document_date.'.$key))
                              <div>
                                <code>{{$errors->first('document_date.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="quantity">{{__("Quantity")}}</label>
                              <input type="number" value="{{old('quantity')[$key]??''}}" name="quantity[]"  class="form-control"  >
                            </div>
                            @if($errors->has('quantity.'.$key))
                              <div>
                                <code>{{$errors->first('quantity.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-1">
                            <div class="mb-3">
                              <label for="unit_price">{{__("Unit Price")}}</label>
                              <input type="number" value="{{old('unit_price')[$key]??''}}" name="unit_price[]"  class="form-control"  >
                            </div>
                            @if($errors->has('unit_price.'.$key))
                              <div>
                                <code>{{$errors->first('unit_price.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-1">
                            <div class="mt-4">
                                <button type="button" class="btn btn-danger removeItem" >{{__("Delete")}}</button>
                            </div>
                      </div>  
                    </div>     
                @empty
                        @forelse ($invoice->invoiceItem??[] as $key=>$item)
                        <div class="row appendItem">
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label>{{__("Product Name")}}</label>
                              <input type="text" value="{{$item->product_name??''}}" name="product_name[]" class="form-control"  >
                            </div>
                            @if($errors->has('product_name.'.$key))
                              <div>
                                <code>{{$errors->first('product_name.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="product_number">{{__("Product Number")}}</label>
                              <input type="number" value="{{$item->product_number??''}}" name="product_number[]"  class="form-control"  >
                            </div>
                            @if($errors->has('product_number.'.$key))
                              <div>
                                <code>{{$errors->first('product_number.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="slip_no">{{__("Slip No")}}</label>
                              <input type="number" value="{{$item->slip_no??''}}" name="slip_no[]"  class="form-control"  >
                            </div>
                            @if($errors->has('slip_no.'.$key))
                              <div>
                                <code>{{$errors->first('slip_no.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="document_date">{{__("Document Date")}}</label>
                              <input type="date" value="{{$item->document_date??''}}" name="document_date[]"  class="form-control"  >
                            </div>
                            @if($errors->has('document_date.'.$key))
                              <div>
                                <code>{{$errors->first('document_date.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-2">
                            <div class="mb-3">
                              <label for="quantity">{{__("Quantity")}}</label>
                              <input type="number" value="{{$item->quantity??''}}" name="quantity[]"  class="form-control"  >
                            </div>
                            @if($errors->has('quantity.'.$key))
                              <div>
                                <code>{{$errors->first('quantity.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-1">
                            <div class="mb-3">
                              <label for="unit_price">{{__("Unit Price")}}</label>
                              <input type="number" value="{{$item->unit_price??''}}" name="unit_price[]"  class="form-control"  >
                            </div>
                            @if($errors->has('unit_price.'.$key))
                              <div>
                                <code>{{$errors->first('unit_price.'.$key)}}</code>
                              </div>
                            @endif
                          </div>
                          <div class="col-md-1">
                            <div class="mt-4">
                                <button type="button" class="btn btn-danger removeItem" >{{__("Delete")}}</button>
                            </div>
                      </div>  
                    </div>      
                    @empty
                      <div class="row appendItem">
                        <div class="col-md-2">
                          <div class="mb-3">
                            <label for="product_name">{{__("Product Name")}}</label>
                            <input type="text" name="product_name[]" class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="mb-3">
                            <label for="product_number">{{__("Product Number")}}</label>
                            <input type="number" name="product_number[]"  class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="mb-3">
                            <label for="slip_no">{{__("Slip No")}}</label>
                            <input type="number" name="slip_no[]"  class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="mb-3">
                            <label for="document_date">{{__("Document Date")}}</label>
                            <input type="date" name="document_date[]"  class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="mb-3">
                            <label for="quantity">{{__("Quantity")}}</label>
                            <input type="number" name="quantity[]"  class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="mb-3">
                            <label for="unit_price">{{__("Unit Price")}}</label>
                            <input type="number" name="unit_price[]"  class="form-control"  >
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="mt-4">
                              <button type="button" class="btn btn-danger removeItem" >{{__("Delete")}}</button>
                          </div>
                      </div>  
                    </div>
                    @endforelse
                @endforelse
                
       
        </div>
            <button class="btn btn-info btn-sm addItem" type="button">+ {{__("Add")}}</button><br><br>
            <button class="btn btn-primary" type="submit">{{__("Update")}}</button>
            <a href="{{route('invoices.index')}}" class="btn btn-info btn-outline">{{__("Back")}}</a>

          </form>


@endsection
@section('footer')

<script>
  $(function(){
      $('.addItem').on('click',function(e){
        console.log('addItem');
        e.preventDefault();
        var appendItem='<div class="row appendItem"> \
                            <div class="col-md-2"> \
                                <div class="mb-3"> \
                                    <label >{{__("Product Name")}}</label> \
                                    <input type="text" name="product_name[]"  class="form-control"> \
                                </div> \
                            </div> \
                            <div class="col-md-2"> \
                                <div class="mb-3"> \
                                    <label >{{__("Product Number")}}</label> \
                                    <input type="number" name="product_number[]" class="form-control" > \
                                </div> \
                            </div> \
                            <div class="col-md-2"> \
                                <div class="mb-3"> \
                                    <label >{{__("Slip No")}}.</label> \
                                    <input type="number" name="slip_no[]"  class="form-control" > \
                                </div> \
                            </div> \
                            <div class="col-md-2"> \
                                <div class="mb-3"> \
                                    <label >{{__("Document Date")}}</label> \
                                    <input type="date" name="document_date[]"  class="form-control"> \
                                </div> \
                            </div> \
                            <div class="col-md-2"> \
                                <div class="mb-3"> \
                                    <label >{{__("Quantity")}}</label> \
                                    <input type="number" name="quantity[]"  class="form-control"> \
                                </div> \
                            </div> \
                            <div class="col-md-1"> \
                                <div class="mb-3"> \
                                    <label >{{__("Unit Price")}}</label> \
                                    <input type="number" name="unit_price[]" class="form-control" > \
                                </div> \
                            </div> \
                            <div class="col-md-1"> \
                                <div class="mt-4"> \
                                    <button type="button" class="btn btn-danger removeItem" >{{__("Delete")}}</button> \
                                </div> \
                            </div> \
                        </div>';
                        $('.myBody').append(appendItem);
                        removeItem();
                        countItem();
      });

    function removeItem() {
                $('.removeItem').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().parent().remove();
                });
                countItem();
    }
    removeItem();
    function countItem() {
                var test = $('.myBody').find('.appendItem').length;
                if (test < 2) {
                    $('.removeItem').hide();
                } else {
                    $('.removeItem').show();
                }
            }

            countItem();
  });

</script>
@endsection