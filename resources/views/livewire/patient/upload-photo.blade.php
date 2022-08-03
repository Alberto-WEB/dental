<div>
    <form wire:submit.prevent="save">
       <input type="file" wire:model="photo" name="photo" id="photo">

        <div wire:loading wire:target="photo">Cargando...</div>

        @error('photo') <span class="error">{{ $message }}</span> @enderror <br><br>
    
        <button class="btn btn-success mb-2" type="submit">Subir Foto</button>
        
    </form>
</div>
