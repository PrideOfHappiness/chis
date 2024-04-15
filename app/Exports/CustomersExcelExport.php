<?php

namespace App\Exports;

use App\Models\Customers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customers::all();
    }

    public function headings(): array{
        return [
            'No.',
            'Customer IDs',
            'Code',
            'Customer Name',
            'Alamat',
            'Contact',
            'Telepon',
            'Telepon HP',
            'Telepon Fax',
            'Email',
            'Kota',
            'Area',
            'Status',
            'Status PKP',
            'Sales ID',
            'Alamat Pengiriman',
            'Bayar Per',
        ];
    }
}
