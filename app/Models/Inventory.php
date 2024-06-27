<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory'; //Deklarasi tabel
    protected $primaryKey = 'inventoryID'; //Deklarasi primary key (untuk yang tidak bernama id)
    public $incrementing = true; //Deklarasi auto-increment. 
    //true = Auto increment on (untuk yang menggunakan tipe id()), 
    //false = auto increment off (Untuk yang menggunakan tipe selain id()).
    protected $fillable = [ //Data yang bisa dimasukkan/dikeluarkan di dalam database. 
        'productIDs',
        'adjustment_code',
        'productQuantity_adjustments',
        'satuan_adjustmets',
        'userID_adjustment',
        'keterangan_return',
        'adjustment_created',
    ];

    public function getProductIDs(){
        return $this->belongsTo(Product::class, 'productIDs', 'productID');
    }

    public function getUserIDs(){
        return $this->belongsTo(User::class, 'userID_adjustment', 'userIDNo');
    }
}
