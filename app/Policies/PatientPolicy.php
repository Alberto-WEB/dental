<?php

namespace App\Policies;

use App\Models\Dentist;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;


    public function author(User $user, Patient $patient)
    {
        if ($user->id === $patient->dentist_id) {
            return true;
        } else {
            return false;
        }
    }
}
