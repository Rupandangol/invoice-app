<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table='invoices';
    protected $fillable=[
        'user_id',
        'client_name',
        'invoice_date',
        'due_date',
        'last_billed_amount',
        'deposit_amount',
        'total_amount',
        'status'
    ];
    public function invoiceItem(){
        return $this->hasMany(InvoiceItem::class,'invoice_id','id');
    }
}
