<?php

namespace App\Exports;

use App\Models\AcuerdoMarco;
use Maatwebsite\Excel\Concerns\FromCollection;

class AcuerdoMarcosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AcuerdoMarco::all();
    }
}
