@section('title', __('Libros'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12 pt-5 pb-3">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-book text-info"></i>
							Libros</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Agregar Libros
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.libros.create')
						@include('livewire.libros.update')
				<div class="table-responsive pt-5 pb-3">
					<table class="table table-hover table-bordered table-striped mb-4">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>ISBN</th>
								<th>Editorial</th>
								<th>Numero Paginas</th>
								<th>Nombre autor</th>
								<td>Opciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($libros as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->isbn }}</td>
								<td>{{ $row->editorial }}</td>
								<td>{{ $row->numero_paginas }}</td>
								<td>{{ $row->nombreAutor }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Libro id {{$row->id}}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $libros->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
