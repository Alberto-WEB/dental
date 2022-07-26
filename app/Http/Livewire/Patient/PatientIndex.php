<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;


class PatientIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $patients = Patient::where('dentist_id', auth()->user()->id)
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        /*  $patients = Patient::orderBy('id', 'DESC')
            ->where('dentist_id', '=', Auth::user()->id)
            ->paginate(10); */

        //dd($patients);

        return view('livewire.patient.patient-index', compact('patients'));
    }
}
