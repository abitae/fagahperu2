<?php

namespace App\Exports;

use App\Models\Negocio;
use Maatwebsite\Excel\Concerns\FromCollection;

class NegociosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Negocio::all();
    }
}
