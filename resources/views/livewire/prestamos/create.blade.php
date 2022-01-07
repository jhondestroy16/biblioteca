<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nuevo Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="fecha_prestamo"></label>
                        <input wire:model="fecha_prestamo" type="datetime-local" class="form-control"
                            id="fecha_prestamo" placeholder="Fecha Prestamo">@error('fecha_prestamo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_devolucion"></label>
                        <input wire:model="fecha_devolucion" type="datetime-local" class="form-control"
                            id="fecha_devolucion" placeholder="Fecha Devolucion">@error('fecha_devolucion') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ejemplar_id"></label>
                        <select wire:model="ejemplar_id" class="form-control" id="ejemplar_id">
                            @error('ejemplar_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected value="">Seleccione...</option>
                            @foreach ($ejemplares as $ejemplar)
                                <option value="{{ $ejemplar->id }}">{{ $ejemplar->localizacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
