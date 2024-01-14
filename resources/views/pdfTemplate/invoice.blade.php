<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        @font-face {
            font-family: 'NotoSansJP-Bold';
            font-style: normal;
            font-weight: normal;
            src: url('assets/fonts/NotoSansJP-Bold.ttf') format('truetype');
            
        }
        @font-face {
            font-family: 'NotoSansJP-regular';
            font-style: normal;
            font-weight: normal;
            src: url('assets/fonts/NotoSansJP-Regular.ttf') format('truetype');
            
        }
        @font-face {
            font-family: 'NotoSansJP';
            font-style: normal;
            font-weight: normal;
            src: url('assets/fonts/NotoSansJP-VariableFont_wght.ttf') format('truetype');
            
        }
        body{
            font-family: 'NotoSansJP','NotoSansJP-regular','NotoSansJP-Bold','sans serif';
        }
        #container{
            margin:10px 20px 10px 40px;
            padding:2px;
        }
        #title{
            text-align: center;
            border: 1px solid black;
            font-size: 30px;
            margin-bottom: 5px;
        }
        .left{
            float: left;
            width: 50%;
        }
        .right{
            float: right;
            width: 50%;
        }
        #tables{
            clear: both;
        }
        table, td, th {
         border: 1px solid;
         padding: 5px
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div id="container">
        <p id="title">{{__("Invoice")}}
        <br>
        <div class="left">
            <p>{{__("Customer")}} {{__("Number")}}: 01</p>
            <h3>{{$company['name']??''}}</h3>
            <p>{{$company['description']??''}}</p>
            <p>{{__("TEL")}}: {{$company['phone']??''}}</p>
            <p>{{__("FAX")}}: {{$company['fax']??''}}</p>
            <br><br>
            <p>{{__("Thank you for your continued support.")}}</p>
            <p>{{__("Please make a request as below")}}</p>
        </div>
        <div class="right" style="text-align: right;">
            <p>{{__("Deadline")}}: {{$due_date??''}}</p>
            <p>{{$company['name']??''}} Co. Ltd. 530-123,</p>
            <p>{{$company['location']??''}}</p>
            <p>{{__("TEL")}}: {{$company['phone']}}({{__("representative")}})</p>
            <p>{{__("Registration")}} {{__("Number")}}: {{$company['registration_number']??''}}</p>
            <br><br>
            <table style="width: 200px;margin-left:170px">
                <tr>
                    <td style="height: 60px"></td>
                    <td></td>
                </tr>
            </table>
        </div>
      

        <div id="tables" style="margin-top: 10px">
            <table>
                <tr>
                    <td>{{__("Last Billed Amount")}}</td>
                    <td>{{__("Deposit Amount")}}</td>
                    <td>{{__("Carryover Amount")}}</td>
                    <td>{{__("Purchase Amount")}}</td>
                    <td>{{__("comsumption Amount")}}</td>
                    <td>{{__("Purchase Total")}}</td>
                    <td>{{__("Current billable amount")}}</td>
                </tr>
                <tr>
                    <td>{{$last_billed_amount??''}}</td>
                    <td>{{$deposit_amount??''}}</td>
                    <td>{{($last_billed_amount??0)-($deposit_amount??0)}}</td>
                    <td>{{$data['sub_total']??''}}</td>
                    <td>{{$data['taxed_only']??''}}</td>
                    <td>{{$data['taxed_sub_total']??''}}</td>
                    <td>{{($data['taxed_sub_total']??0)+(($last_billed_amount??0)-($deposit_amount??0))}}</td>
                </tr>
            </table>
            <br><br>
            <table>
                <tr>
                    <td>{{__("Document Date")}}</td>
                    <td>{{__("Slip No")}}</td>
                    <td>{{__("Product Name")}}</td>
                    <td>{{__("Product Number")}}</td>
                    <td>{{__("Quantity")}}</td>
                    <td>{{__("Unit Price")}}</td>
                    <td>{{__("Amount")}}</td>
                </tr>
                @foreach($invoice_item as $item)
                <tr>
                    <td>{{$item['document_date']??''}}</td>
                    <td>{{$item['slip_no']??''}}</td>
                    <td>{{$item['product_name']??''}}</td>
                    <td>{{$item['product_number']??''}}</td>
                    <td>{{$item['quantity']??''}}</td>
                    <td>{{$item['unit_price']??''}}</td>
                    <td>{{($item['unit_price']??0)*($item['quantity']??0)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" style="text-align: right">{{__("Sub Total")}}</td>
                    <td>{{$data['sub_total']??''}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right">{{config('tax.vat')}}% {{__("Vat")}}</td>
                    <td>{{$data['taxed_only']??''}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right">{{__("Grand")}} {{__("Total")}}</td>
                    <td>{{$data['taxed_sub_total']??''}}</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>