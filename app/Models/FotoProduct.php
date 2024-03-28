<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProduct extends Model
{
    use HasFactory;
    protected $table = 'foto_product';
    protected $fillable = ['productID', 'namaFile'];

    public function getProductIDFromProduct(){
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
