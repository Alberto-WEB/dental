<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class PatientsExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return Patient::where('dentist_id', auth()->user()->id)->get();
        //dd($patient);
        //return Patient::all();
    }
}
