<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Ejemplare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="localizacion"></label>
                        <input wire:model="localizacion" type="text" class="form-control" id="localizacion"
                            placeholder="Localizacion">@error('localizacion') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="libro_id"></label>
                        <select wire:model="libro_id" class="form-control" id="libro_id">
                            @error('libro_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected value="">Seleccione...</option>
                            @foreach ($libros as $libro)
                                <option value="{{ $libro->id }}">{{ $libro->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
