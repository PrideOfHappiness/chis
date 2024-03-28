<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'customerID';
    public $incrementing = true;
    protected $fillable = [
        'customerIDs',
        'code',
        'customerName',
        'alamat',
        'contact',
        'telepon',
        'teleponHP',
        'teleponFax',
        'email',
        'kota',
        'area',
        'status',
        'statusPKP',
        'userIDSales',
        'deliveryAddress',
        'bayarPer',
    ];
}
