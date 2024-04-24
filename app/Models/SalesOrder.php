<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $table = 'sales_order';
    protected $primaryKey = 'salesOrderID';
    public $incrementing = true;
    protected $fillable = [
        'salesOrderIDs',
        'SODateCreated',
        'customers',
        'total',
    ];

    public function getCustomerID(){
        return $this->belongsTo(Customers::class, 'customers', 'salesOrderID');
    }

    public function setCustomerID(){
        return $this->hasMany(InvoiceCustomer::class, 'SO', 'invoiceID');
    }
}
