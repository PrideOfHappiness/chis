<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table = 'purchase_order';
    protected $primaryKey = 'purchaseOrderID';
    public $incrementing = true;
    protected $fillable = [
        'purchaseOrderNo',
        'version',
        'PODate',
        'supplier',
        'status',
    ];

    public function getSupplierID(){
        return $this->belongsTo(Suppliers::class, 'supplier', 'supplierID');
    }

    public function setPurchaseOrderID(){
        return $this->hasMany(InvoiceRecieved::class, 'purchaseOrderID', 'invoiceRecievedID');
    }
}
