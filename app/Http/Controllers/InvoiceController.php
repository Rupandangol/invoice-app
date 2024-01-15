<?php

namespace App\Http\Controllers;

use App\Helper\PdfGeneratorHelper;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Traits\TotalCalculatorTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    use TotalCalculatorTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices=Invoice::simplePaginate(10);
        return view('invoice.index',['invoices'=>$invoices,'sidebarInvoices'=>'active']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice.create',['sidebarInvoices'=>'active']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request)
    {
        $data=$this->invoiceDatabind($request);
        $invoice=Invoice::create($data);

        foreach($request->product_name as $key=>$item){
            $dataItem=$this->invoiceItemDatabind($invoice->id,$request,$key);
            InvoiceItem::create($dataItem);
        }
        return redirect(route('invoices.index'))->with('success','Invoice Created Successfully');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        
        $invoice['data']=$this->totalCalculator($invoice->invoiceItem);

        return view('invoice.show',['invoice'=>$invoice,'sidebarInvoices'=>'active']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        return view('invoice.edit',['invoice'=>$invoice,'sidebarInvoices'=>'active']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, string $id)
    {
        $invoice=Invoice::findOrFail($id)->delete();
        $data=$this->invoiceDatabind($request);
        $invoice=Invoice::create($data);

        foreach($request->product_name as $key=>$item){
            $dataItem=$this->invoiceItemDatabind($invoice->id,$request,$key);
            InvoiceItem::create($dataItem);
        }

        return redirect(route('invoices.show',$invoice->id))->with('success','Invoice Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Invoice::findOrFail($id)->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    /**
     * Download Pdf.
     */
    public function download(string $id)
    {
        $data=$this->downloadData($id);
        $pdf = Pdf::loadView('pdfTemplate.invoice',$data);
        return $pdf->download('invoice.pdf');
    }
    /**
     * Stream Pdf.
     */
    public function stream(string $id)
    {
        $data=$this->downloadData($id);
        $pdf = Pdf::loadView('pdfTemplate.invoice',$data);
        return $pdf->stream('invoice.pdf');
    }

    /**
     *  Invoice Data Bind.
     */
    protected function invoiceDatabind($request){
        $data['user_id']=Auth::user()->id;
        $data['client_name']=$request->client_name;
        $data['invoice_date']=$request->invoice_date;
        $data['due_date']=$request->due_date;
        $data['last_billed_amount']=$request->last_billed_amount;
        $data['deposit_amount']=$request->deposit_amount;
        $data['total_amount']=$request->total_amount;
        $data['status']=$request->status;
        return $data;
    }

    /**
     * Invoice Item data bind
     */
    protected function invoiceItemDatabind($invoiceId,$request,$key){
        $dataItem['invoice_id']=$invoiceId;
        $dataItem['product_name']=$request->product_name[$key];
        $dataItem['product_number']=$request->product_number[$key];
        $dataItem['slip_no']=$request->slip_no[$key];
        $dataItem['document_date']=$request->document_date[$key];
        $dataItem['quantity']=$request->quantity[$key];
        $dataItem['unit_price']=$request->unit_price[$key];
        return $dataItem;
    }

    /**
     * Download Data 
     */
    protected function downloadData(string $id) : array {
        $data['company']=Company::all()->first();
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        $data['data']=$this->totalCalculator($invoice->invoiceItem);
        $data['last_billed_amount']=$invoice->last_billed_amount;
        $data['deposit_amount']=$invoice->last_billed_amount;
        $data['client_name']=$invoice->client_name;
        $data['invoice_date']=$invoice->invoice_date;
        $data['due_date']=$invoice->due_date;
        $data['invoice_item']=$invoice->invoiceItem->toArray();
        return $data??[];
    }
}
