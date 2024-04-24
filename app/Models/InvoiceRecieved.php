<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceRecieved extends Model
{
    use HasFactory;
    protected $table = 'invoice_recieved';
    protected $primaryKey = 'invoiceRecievedID';
    public $incrementing = true;
    protected $fillable = [
        'goodsRecievedID',
        'tanggalPenerimaan',
        'warehouseID',
        'purchaseOrderID',
    ];

    public function getWarehouseID(){
        return $this->belongsTo(Suppliers::class, 'warehouseID', 'warehouseID');
    }
    public function getPurchaseOrderID(){
        return $this->belongsTo(PurchaseOrder::class, 'purchaseOrderID', 'purchaseOrderID');
    }

    public function setInvoiceID(){
        return $this->hasMany(SupplierPayment::class, 'invoiceIDs', 'paymentID');
    }
}
