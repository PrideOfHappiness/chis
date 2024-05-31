<?php

namespace App\Imports;

use App\Models\VehicleType;
use Maatwebsite\Excel\Concerns\ToModel;

class VehicleTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VehicleType([
            'kendaraan' => $row['vehicle'],
            'type' => $row['model_type'],
        ]);
    }
}
