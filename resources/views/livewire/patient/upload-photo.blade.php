<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="photo">
        <div wire:loading wire:target="photo">Uploading...</div>
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    
        <button class="button" type="submit">Save Photo</button>
        
    </form>
</div>
