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
        #container{
            margin:10px 20px 10px 40px;
            padding:2px;
        }
        #title{
            text-align: center;
            border: 1px solid black;
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
        <h1 id="title">Invoice</h1>
        <br>
        <div class="left">
            <p>Customer Number:01</p>
            <h3>MBN Store</h3>
            <p>We are a zero soft company that supports small and meduim sized business</p>
            <p>TEL: 129831298</p>
            <p>FAX: 2312312</p>
            <br><br>
            <p>Thank you for your continued support.</p>
            <p>Please make a request as below</p>
        </div>
        <div class="right" style="text-align: right">
            <p>Deadline: July 31,2023</p>
            <p>MBN Trading Co. Ltd. 530-123,</p>
            <p>Balaju, banasthali, kathmandu</p>
            <p>TEL: 129831298(representative)</p>
            <p>Name: MBN Shokuji</p>
            <p>Registration Number: 12312312</p>
            <br><br>
            <table style="width: 200px">
                <tr>
                    <td style="height: 60px"></td>
                    <td></td>
                </tr>
            </table>
        </div>
      

        <div id="tables" style="margin-top: 10px">
            <table>
                <tr>
                    <th>Last Billed Amount</th>
                    <th>Deposit Amount</th>
                    <th>Carryover Amount</th>
                    <th>Purchase Amount</th>
                    <th>comsumption Amount</th>
                    <th>Purchase Total</th>
                    <th>Current billable amount</th>
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
                    <th>Document Date</th>
                    <th>Slip No</th>
                    <th>Product Name</th>
                    <th>Product Number</th>
                    <th>Quantity</th>
                    <th>Unit Price	</th>
                    <th>Amount</th>
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
                    <td colspan="6" style="text-align: right">Sub Total</td>
                    <td>{{$data['sub_total']??''}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right">{{config('tax.vat')}}% vat</td>
                    <td>{{$data['taxed_only']??''}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: right">Grand Total</td>
                    <td>{{$data['taxed_sub_total']??''}}</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>