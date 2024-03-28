<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeAkun extends Model
{
    use HasFactory;
    protected $table = 'kode_akun';
    protected $primaryKey = 'kode_akun';
    public $incrementing = false;
    protected $fillable = [
        'kode_akun', 
        'nama_akun',
    ];
}
