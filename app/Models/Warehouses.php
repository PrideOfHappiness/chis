<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $primaryKey = 'warehouseID';
    public $incrementing = true;
    protected $fillable = [
        'warehouseIDs',
        'warehouseName',
        'alamat',
        'contact',
        'telepon',
        'teleponHP',
        'email',
        'status',
    ];
}
