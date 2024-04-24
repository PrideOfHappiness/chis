<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;
    protected $table = 'supplier_payment';
    protected $primaryKey = 'paymentID';
    public $incrementing = true;
    protected $fillable = [
        'paymentNo',
        'paymentDate',
        'invoiceIDs',
        'paymentTotal',
        'payment_type',
        'bank_noRek',
        'payment_reference',
        'notes',
    ];

    public function getInvoiceIDs(){
        return $this->belongsTo(InvoiceCustomer::class, 'invoiceIDs', 'invoiceID');
    }
}
