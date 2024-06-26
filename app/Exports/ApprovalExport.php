<?php

namespace App\Exports;

use App\Models\UserApproval;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApprovalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserApproval::all();
    }
}
