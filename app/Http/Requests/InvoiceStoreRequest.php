<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_name'=>['required'],
            'invoice_date'=>['required'],
            'due_date'=>['required'],
            'last_billed_amount'=>['required'],
            'deposit_amount'=>['required'],
            'status'=>['required'],
            'product_number'=>['required'],
            'product_number.*'=>['required'],
            'slip_no'=>['required'],
            'slip_no.*'=>['required'],
            'document_date'=>['required'],
            'document_date.*'=>['required'],
            'quantity'=>['required'],
            'quantity.*'=>['required'],
            'unit_price'=>['required'],
            'unit_price.*'=>['required'],
            'product_name'=>['required'],
            'product_name.*'=>['required'],
        ];
    }
}
