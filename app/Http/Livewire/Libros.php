<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Libro;
use App\Models\Autor;

class Libros extends Component
{
    public function __construct()
    {
        $this->middleware('can:libros');
    }
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $isbn, $editorial, $numero_paginas, $autor_id;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.libros.view', [
            // 'libros' => Libro::latest()
            //     ->orWhere('nombre', 'LIKE', $keyWord)
            //     ->orWhere('isbn', 'LIKE', $keyWord)
            //     ->orWhere('editorial', 'LIKE', $keyWord)
            //     ->orWhere('numero_paginas', 'LIKE', $keyWord)
            //     ->orWhere('autor_id', 'LIKE', $keyWord)
            //     ->paginate(10),
            'libros' => Libro::join('autores', 'libros.autor_id', '=', 'autores.id')
                ->select('libros.*', 'autores.nombre as nombreAutor')
                ->paginate(10),
            'autores' => Autor::all()
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->nombre = null;
        $this->isbn = null;
        $this->editorial = null;
        $this->numero_paginas = null;
        $this->autor_id = null;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'isbn' => 'required',
            'editorial' => 'required',
            'numero_paginas' => 'required',
            'autor_id' => 'required',
        ]);

        Libro::create([
            'nombre' => $this->nombre,
            'isbn' => $this->isbn,
            'editorial' => $this->editorial,
            'numero_paginas' => $this->numero_paginas,
            'autor_id' => $this->autor_id
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Libro Successfully created.');
    }

    public function edit($id)
    {
        $record = Libro::findOrFail($id);

        $this->selected_id = $id;
        $this->nombre = $record->nombre;
        $this->isbn = $record->isbn;
        $this->editorial = $record->editorial;
        $this->numero_paginas = $record->numero_paginas;
        $this->autor_id = $record->autor_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'isbn' => 'required',
            'editorial' => 'required',
            'numero_paginas' => 'required',
            'autor_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Libro::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'isbn' => $this->isbn,
                'editorial' => $this->editorial,
                'numero_paginas' => $this->numero_paginas,
                'autor_id' => $this->autor_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Libro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Libro::where('id', $id);
            $record->delete();
        }
    }
}
