<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'telephone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'genre' =>fake()->randomElement($array = array ('male','femelle')),
            'hebergement'=>fake()->randomElement($array = array ('proprietaire','locataire')),
            'situation_familiale'=>fake()->boolean(),
            'adresse'=>fake()->address(),
            'ville'=>fake()->city(),
            'departement'=>fake()->numberBetween(1,999),
            'montant_facture'=>fake()->numberBetween(1,1900),
            'reste_a_vivre'=>fake()->numberBetween(1,1000),
        ];
    }
}
