<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriHargaBeli extends Model
{
    use HasFactory;
    protected $tableName = 'histori_harga_beli';
    protected $primaryKey = 'historiHargaPembelianID';
    public $incrementing = true;
    protected $fillable = [
        'purchaseOrderIDs',
        'stock_no',
        'part_no',
        'price',
        'qty',
        'notes',
    ];
}
