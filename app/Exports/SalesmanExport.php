<?php

namespace App\Exports;

use App\Models\Salesman;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalesmanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Salesman::all();
    }
}
