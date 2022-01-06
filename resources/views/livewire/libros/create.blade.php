<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre"></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre"
                            placeholder="Nombre">@error('nombre') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="isbn"></label>
                        <input wire:model="isbn" type="text" class="form-control" id="isbn"
                            placeholder="Isbn">@error('isbn') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="editorial"></label>
                        <input wire:model="editorial" type="text" class="form-control" id="editorial"
                            placeholder="Editorial">@error('editorial') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_paginas"></label>
                        <input wire:model="numero_paginas" type="text" class="form-control" id="numero_paginas"
                            placeholder="Numero Paginas">@error('numero_paginas') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="autor_id"></label>
                        <select wire:model="autor_id" class="form-control" id="autor_id">
                            @error('autor_id') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                            <option selected disabled value="">Seleccione...</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
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
