<?php

namespace Database\Factories;

use App\Models\Ejemplare;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EjemplareFactory extends Factory
{
    protected $model = Ejemplare::class;

    public function definition()
    {
        return [
			'localizacion' => $this->faker->name,
			'libro_id' => $this->faker->name,
        ];
    }
}
