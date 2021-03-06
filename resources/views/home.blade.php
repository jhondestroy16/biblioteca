@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-5 pb-3">
                <div class="card">
                    <div class="card-header">
                        <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                    </div>
                    <div class="card-body">
                        <h5>Hi <strong>{{ Auth::user()->name }},</strong>
                            {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
                        </br>
                        <hr>

                        <div class="row w-100">
                            <div class="col-md-3">
                                <div class="card border-info mx-sm-1 p-3">
                                    <div class="card border-info text-info p-3"><span class="text-center fas fa-book-reader"
                                            aria-hidden="true"></span></div>
                                    <div class="text-info text-center mt-3">
                                        <h4>Prestamos realizados</h4>
                                    </div>
                                    <div class="text-info text-center mt-2">
                                        <h1>{{ $cantidadPrestamos }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-success mx-sm-1 p-3">
                                    <div class="card border-success text-success p-3 my-card"><span
                                            class="text-center fab fa-ubuntu" aria-hidden="true"></span></div>
                                    <div class="text-success text-center mt-3">
                                        <h4>Ejemplares</h4>
                                    </div>
                                    <div class="text-success text-center mt-2">
                                        <h1>{{ $cantidadEjemplares }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-danger mx-sm-1 p-3">
                                    <div class="card border-danger text-danger p-3 my-card"><span
                                            class="text-center fas fa-book" aria-hidden="true"></span></div>
                                    <div class="text-danger text-center mt-3">
                                        <h4>Libros</h4>
                                    </div>
                                    <div class="text-danger text-center mt-2">
                                        <h1>{{ $cantidadLibros }}</h1>
                                    </div>
                                </div>
                            </div>
                            @can('autores')
                                <div class="col-md-3">
                                    <div class="card border-warning mx-sm-1 p-3">
                                        <div class="card border-warning text-warning p-3 my-card"><span
                                                class="text-center fa fa-users" aria-hidden="true"></span></div>
                                        <div class="text-warning text-center mt-3">
                                            <h4>Users</h4>
                                        </div>
                                        <div class="text-warning text-center mt-2">
                                            <h1>{{ Auth::user()->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
