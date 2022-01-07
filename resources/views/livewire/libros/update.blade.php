<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
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
                            @error('autor_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected value="">Seleccione...</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
