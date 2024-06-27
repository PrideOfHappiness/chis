<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReturn extends Model
{
    use HasFactory;

    protected $table='inventory_return';
    protected $primaryKey = 'inventory_returnID';
    public $incrementing = true;
    protected $fillable = [ 
        'productIDs',
        'return_code',
        'productQuantity_return',
        'satuan_return',
        'customerIDs',
        'supplierIDs',
        'userID_return',
        'keterangan_return',
        'return_created',
        'harga_retur',
        'biaya_tambahan',
    ];

    public function getProductID(){
        return $this->belongsTo(Product::class, 'productIDs', 'productID');
    }

    public function getSupplierID(){
        return $this->belongsTo(Suppliers::class, 'supplierIDs', 'supplierID');
    }

    public function getCustomerID(){
        return $this->belongsTo(Customers::class, 'customerIDs', 'customerID');
    }

    public function getUserIDReturn(){
        return $this->belongsTo(User::class, 'userID_return', 'userIDNo');
    }
}
