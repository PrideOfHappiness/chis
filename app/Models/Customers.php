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
        'telepon2',
        'teleponHP2',
        'teleponFax2',
        'telepon3',
        'teleponHP3',
        'teleponFax3',
        'email',
        'kota',
        'area',
        'status',
        'statusPKP',
        'userIDSales',
        'deliveryAddress',
        'bayarPer',
    ];

    public function setCustomerID(){
        return $this->hasMany(SalesOrder::class, 'customers', 'customerID');
    }

    public function getUserID(){
        return $this->belongsTo(User::class, 'userIDSales', 'userIDNo');
    }
}
