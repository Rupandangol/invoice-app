<?php

namespace App\Http\Controllers;

use App\Helper\PdfGeneratorHelper;
use App\Models\Invoice;
use App\Traits\TotalCalculatorTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use TotalCalculatorTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices=Invoice::simplePaginate();
        return view('invoice.index',['invoices'=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        
        $invoice['data']=$this->totalCalculator($invoice->invoiceItem);

        return view('invoice.show',['invoice'=>$invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    /**
     * Download Pdf.
     */
    public function download(string $id)
    {
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        $data['data']=$this->totalCalculator($invoice->invoiceItem);
        $data['last_billed_amount']=$invoice->last_billed_amount;
        $data['deposit_amount']=$invoice->last_billed_amount;
        $data['invoice_item']=$invoice->invoiceItem->toArray();
        $pdf = Pdf::loadView('pdfTemplate.invoice',$data);
        return $pdf->stream('invoice.pdf');
    }

}
