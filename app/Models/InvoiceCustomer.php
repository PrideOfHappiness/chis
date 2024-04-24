<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceCustomer extends Model
{
    use HasFactory;
    protected $table = 'sales_invoices';
    protected $primaryKey = 'invoiceID';
    public $incrementing = true;
    protected $fillable = [
        'SO',
        'invoiceNo',
        'InvoiceDate',
        'status',
    ];

    public function getSONumber(){
        return $this->belongsTo(SalesOrder::class, 'SO', 'salesOrderID');
    }

    public function setInvoiceIDs(){
        return $this->hasMany(CustomerPayment::class, 'invoiceIDs', 'paymentID');
    }

}
