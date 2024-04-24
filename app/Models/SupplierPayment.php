<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    use HasFactory;
    protected $table = 'customer_payment';
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

    public function getPaymentID(){
        return $this->belongsTo(InvoiceRecieved::class, 'invoiceIDs', 'invoiceRecievedID');
    }
}
