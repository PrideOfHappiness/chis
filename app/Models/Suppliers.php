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
        'email',
        'kategori',
        'status',
        'bayarPer',
        'npwp',
        'teleponFax',
    ];
}
