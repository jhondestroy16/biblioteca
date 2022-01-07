<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prestamo;
use App\Models\Ejemplar;
use App\Models\User;

class Prestamos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha_prestamo, $fecha_devolucion, $user_id, $ejemplar_id;
    public $updateMode = false;

    public function render()
    {
        $id = Auth::id();
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.prestamos.view', [
            // 'prestamos' => Prestamo::latest()
            //     ->orWhere('fecha_prestamo', 'LIKE', $keyWord)
            //     ->orWhere('fecha_devolucion', 'LIKE', $keyWord)
            //     ->orWhere('user_id', 'LIKE', $keyWord)
            //     ->orWhere('ejemplar_id', 'LIKE', $keyWord)
            //     ->paginate(10),
            'prestamos' => Prestamo::join('users', 'prestamos.user_id', '=', 'users.id')
                ->join('ejemplares', 'prestamos.ejemplar_id', '=', 'ejemplares.id')
                ->select('prestamos.*', 'ejemplares.*', 'users.*')
                ->paginate(10),
            'ejemplares' => Ejemplar::all(),
            'usuarios' => User::all()
                ->where('id', '=', $id)
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->fecha_prestamo = null;
        $this->fecha_devolucion = null;
        $this->user_id = null;
        $this->ejemplar_id = null;
    }

    public function store()
    {
        $this->validate([
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'user_id' => 'required',
            'ejemplar_id' => 'required',
        ]);

        Prestamo::create([
            'fecha_prestamo' => $this->fecha_prestamo,
            'fecha_devolucion' => $this->fecha_devolucion,
            'user_id' => $this->user_id,
            'ejemplar_id' => $this->ejemplar_id
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Prestamo Successfully created.');
    }

    public function edit($id)
    {
        $record = Prestamo::findOrFail($id);

        $this->selected_id = $id;
        $this->fecha_prestamo = $record->fecha_prestamo;
        $this->fecha_devolucion = $record->fecha_devolucion;
        $this->user_id = $record->user_id;
        $this->ejemplar_id = $record->ejemplar_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'user_id' => 'required',
            'ejemplar_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Prestamo::find($this->selected_id);
            $record->update([
                'fecha_prestamo' => $this->fecha_prestamo,
                'fecha_devolucion' => $this->fecha_devolucion,
                'user_id' => $this->user_id,
                'ejemplar_id' => $this->ejemplar_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Prestamo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Prestamo::where('id', $id);
            $record->delete();
        }
    }
}
