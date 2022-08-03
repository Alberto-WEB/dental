<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:1024'
        ]);

        $user = Auth::user();
        $nameFile = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();

        //dd($nameFile);

        if ($path = $this->photo->storeAs('imagesProfile/', $nameFile)) {
            $user->update([
                'avatar' => $path
            ]);
        }

        return redirect()->route('profile.edit');


        //Storage::disk('imagesProfile')->delete(str_replace('imagesProfile/', '', $user->img_perfil));
    }

    public function render()
    {
        return view('livewire.patient.upload-photo');
    }
}
