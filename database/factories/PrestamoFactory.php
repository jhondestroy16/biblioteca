<?php

namespace Database\Factories;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;

    public function definition()
    {
        return [
			'fecha_prestamo' => $this->faker->name,
			'fecha_devolucion' => $this->faker->name,
			'user_id' => $this->faker->name,
			'ejemplar_id' => $this->faker->name,
        ];
    }
}
