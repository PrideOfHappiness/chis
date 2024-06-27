<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';
    protected $primaryKey = 'brandID';
    public $incrementing = true;

    protected $fillable = ['brand'];

    public function setBrand(){
        return $this->hasMany(Product::class, 'brandID', 'productID');
    }
}
