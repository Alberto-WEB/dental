<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PatientsExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('patients.export', [
            'patients' => Patient::where('dentist_id', auth()->user()->id)->get()
        ]);
    }

    public function collection()
    {
        //return Patient::where('dentist_id', auth()->user()->id)->get();
        //dd($patient);
        //return Patient::all();
    }
}
