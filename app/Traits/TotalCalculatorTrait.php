<?php
namespace App\Traits;

trait TotalCalculatorTrait
{
    public function totalCalculator($invoiceItem): array{
        $subtotal=0;
        $taxOnly=0;
        $taxedSubtotal=0;
        foreach($invoiceItem as $item){
            $subtotal+=($item['unit_price']*$item['quantity']);
            // $taxOnly+=(($item['unit_price']*$item['quantity'])*($item['tax_percent']/100));
            // $taxedSubtotal+=(($item['unit_price']*$item['quantity'])*($item['tax_percent']/100))+($item['unit_price']*$item['quantity']);
        }
        $invoice['sub_total']=$subtotal;
        $invoice['taxed_only']=$subtotal*(config('tax.vat')/100);
        $invoice['taxed_sub_total']=$subtotal+$invoice['taxed_only'];
        return $invoice;   
    }
}