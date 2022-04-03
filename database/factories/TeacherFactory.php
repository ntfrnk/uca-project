<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
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
            'status' => 1,
        ];
    }
}
