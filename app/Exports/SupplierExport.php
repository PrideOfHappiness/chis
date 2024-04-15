<?php

namespace App\Exports;

use App\Models\Suppliers;
use Maatwebsite\Excel\Concerns\FromCollection;

class SupplierExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Suppliers::all();
    }
}
