<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marca>
 */
class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $marcas = [
            'Electrolux',
            'Brastemp',
            'Fischer',
            'Samsung',
            'LG',
        ];

        return [
            'nome' => $this->faker->unique(false)->randomElement($marcas)
        ];
    }
}
