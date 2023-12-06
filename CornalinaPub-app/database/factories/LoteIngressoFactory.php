<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoteIngresso>
 */
class LoteIngressoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event=DB::table("events")->pluck('id');
        $faker = Faker::create("pt_BR");
        return [
            'evento_id' => $faker->randomElement($event),
            "descricao" => fake()->name(),
        ];
    }
}