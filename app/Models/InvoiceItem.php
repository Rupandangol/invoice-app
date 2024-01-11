<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $table='invoice_items';
    protected $fillable=[
        'invoice_id',
        'product_name',
        'product_number',
        'slip_no',
        'document_date',
        'quantity',
        'unit_price'
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class,'id','invoice_id');
    }
}
