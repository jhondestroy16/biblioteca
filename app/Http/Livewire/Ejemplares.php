<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ejemplar;
use App\Models\Libro;

class Ejemplares extends Component
{
    public function __construct()
    {
        $this->middleware('can:ejemplares');
    }

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $localizacion, $libro_id;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.ejemplares.view', [
            // 'ejemplares' => Ejemplar::latest()
            // 			->orWhere('localizacion', 'LIKE', $keyWord)
            // 			->orWhere('libro_id', 'LIKE', $keyWord)
            // 			->paginate(10),
            'ejemplares' => Ejemplar::join('libros', 'ejemplares.libro_id', '=', 'libros.id')
                ->select('libros.*', 'ejemplares.*')
                ->paginate(10),
            'libros' => Libro::all()
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->localizacion = null;
        $this->libro_id = null;
    }

    public function store()
    {
        $this->validate([
            'localizacion' => 'required',
            'libro_id' => 'required',
        ]);

        Ejemplar::create([
            'localizacion' => $this->localizacion,
            'libro_id' => $this->libro_id
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Ejemplar Successfully created.');
    }

    public function edit($id)
    {
        $record = Ejemplar::findOrFail($id);

        $this->selected_id = $id;
        $this->localizacion = $record->localizacion;
        $this->libro_id = $record->libro_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'localizacion' => 'required',
            'libro_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Ejemplar::find($this->selected_id);
            $record->update([
                'localizacion' => $this->localizacion,
                'libro_id' => $this->libro_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Ejemplare Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ejemplar::where('id', $id);
            $record->delete();
        }
    }
}
