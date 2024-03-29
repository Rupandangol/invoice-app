<?php
namespace App\Helper;

use App\Models\Invoice;
use App\Traits\TotalCalculatorTrait;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfGeneratorHelper
{
    use TotalCalculatorTrait;

    public function download(string $id){
        $invoice=Invoice::with('invoiceItem')->findOrFail($id);
        $data['data']=$this->totalCalculator($invoice->invoiceItem);
        $data['last_billed_amount']=$invoice->last_billed_amount;
        $data['deposit_amount']=$invoice->last_billed_amount;
        $data['invoice_item']=$invoice->invoiceItem->toArray();
        $pdf = Pdf::loadView('pdfTemplate.invoice',$data);
        return $pdf->download('invoice.pdf');
    }
}