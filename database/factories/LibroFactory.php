<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'isbn' => $this->faker->name,
			'editorial' => $this->faker->name,
			'numero_paginas' => $this->faker->name,
			'autor_id' => $this->faker->name,
        ];
    }
}
