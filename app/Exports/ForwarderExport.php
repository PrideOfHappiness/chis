<?php

namespace App\Exports;

use App\Models\Forwarders;
use Maatwebsite\Excel\Concerns\FromCollection;

class ForwarderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Forwarders::all();
    }
}
