<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('es_AR');

        return [
            'name' => $faker->firstName(),
            'lastname' => $faker->lastName(),
            'email' => $faker->email(),
            'password' => Hash::make('generic'),
            'status' => 1,
        ];
    }
}
