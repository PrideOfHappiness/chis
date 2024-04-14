<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forwarders extends Model
{
    use HasFactory;
    protected $table = 'forwarder';
    protected $primaryKey = 'forwaderID';
    public $incrementing = true;
    protected $fillable = [
        'code',
        'forwaderName',
        'alamat',
        'city',
        'contact',
        'telepon',
        'teleponHP',
        'email',
        'status',
    ];
}
