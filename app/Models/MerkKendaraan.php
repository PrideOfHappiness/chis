<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkKendaraan extends Model
{
    use HasFactory;
    protected $table = 'merk_kendaraan';
    protected $primaryKey = 'merkID';
    public $incerementing = true;
    protected $fillable = ['inisial', 'namaKendaraan'];

    public function setMerkKendaraan(){
        return $this->hasMany(VehicleType::class, 'nama', 'vehicleTypeID');
    }
}
