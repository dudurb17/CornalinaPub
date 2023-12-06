<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $empresas=DB::table("empresas")->pluck('id');
        $faker = Faker::create("pt_BR");
        return [
            'empresa_id' => $faker->randomElement($empresas),
            "nome" => fake()->name(),
            'data'=>fake()->date(),
            'numero_de_ingressos'=>strval(rand(0, 99)),
            "endereco" => fake()->name(),
        ];
    }
}