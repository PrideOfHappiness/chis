<?php

namespace App\Exports;

use App\Models\Suppliers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuppliersExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Suppliers::all();
    }

    public function headings(): array{
        return [
            'No.',
            'Supplier ID',
            'Code',
            'Supplier Name',
            'Alamat',
            'Contact',
            'Telepon',
            'Nomor HP',
            'Email',
            'Kategori',
            'Status',
            'Bayar Per',
            'NPWP',
            'Telepon Fax',
        ];
    }
}
