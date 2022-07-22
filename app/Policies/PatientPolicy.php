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
        return $user->id === $patient->id;
    }
}
