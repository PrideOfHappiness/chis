<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'supplierID';
    public $incrementing = true;
    protected $fillable = [
        'supplierIDs',
        'code',
        'supplierName',
        'alamat',
        'contact',
        'telepon',
        'teleponHP',
        'telepon2',
        'teleponHP2',
        'teleponFax2',
        'telepon3',
        'teleponHP3',
        'teleponFax',
        'email',
        'kategori',
        'status',
        'bayarPer',
        'npwp',
        'teleponFax',
    ];

    public function setSupplierID(){
        return $this->hasMany(PurchaseOrder::class, 'supplier', 'purchaseOrderID');
    }
}
