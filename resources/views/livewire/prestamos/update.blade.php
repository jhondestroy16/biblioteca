<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="fecha_prestamo"></label>
                        <input wire:model="fecha_prestamo" type="text" class="form-control" id="fecha_prestamo"
                            placeholder="Fecha Prestamo">@error('fecha_prestamo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_devolucion"></label>
                        <input wire:model="fecha_devolucion" type="text" class="form-control" id="fecha_devolucion"
                            placeholder="Fecha Devolucion">@error('fecha_devolucion') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id"></label>
                        <select wire:model="user_id" class="form-control" id="user_id">
                            @error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected disabled value="">Seleccione...</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ejemplar_id"></label>
                        <select wire:model="ejemplar_id" class="form-control" id="ejemplar_id">
                            @error('ejemplar_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected disabled value="">Seleccione...</option>
                            @foreach ($ejemplares as $ejemplar)
                                <option value="{{ $ejemplar->id }}">{{ $ejemplar->localizacion }}</option>
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
