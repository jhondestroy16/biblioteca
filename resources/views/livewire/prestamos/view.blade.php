@section('title', __('Prestamos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12 pt-5 pb-3">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Prestamo Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Prestamos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Prestamos
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.prestamos.create')
						@include('livewire.prestamos.update')
				<div class="table-responsive pt-5 pb-3">
					<table class="table table-hover table-bordered table-striped mb-4">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Fecha Prestamo</th>
								<th>Fecha Devolucion</th>
								<th>Usuario</th>
								<th>Ejemplar</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($prestamos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->fecha_prestamo }}</td>
								<td>{{ $row->fecha_devolucion }}</td>
								<td>{{ $row->user_id }}</td>
								<td>{{ $row->ejemplar_id }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Prestamo id {{$row->id}}? \nDeleted Prestamos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $prestamos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
