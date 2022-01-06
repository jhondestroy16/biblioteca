<?php

namespace Database\Factories;

use App\Models\Autore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AutoreFactory extends Factory
{
    protected $model = Autore::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
