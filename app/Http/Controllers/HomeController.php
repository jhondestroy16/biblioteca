<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prestamo;
use App\Models\Ejemplar;
use App\Models\Libro;
use App\Models\Autor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cantidadPrestamos = DB::table('prestamos')
            ->select()->count('*');
        $cantidadLibros = DB::table('libros')
            ->select()->count('*');
        $cantidadEjemplares = DB::table('ejemplares')
            ->select()->count('*');
        return view('home', compact('cantidadPrestamos', 'cantidadLibros','cantidadEjemplares'));
    }
}
