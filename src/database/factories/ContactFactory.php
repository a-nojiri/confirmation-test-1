<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male','female','other']);

        return [
             'last_name'     => $this->faker->lastName(),
            'first_name'    => $this->faker->firstName(),
            'gender'        => $gender,
            'email'         => $this->faker->unique()->safeEmail(),
            'tel'           => '0' . $this->faker->numerify('9#########'),
            'address'       => $this->faker->address(),
            'building_name' => $this->faker->optional()->secondaryAddress(),
            'category_id'   => Category::inRandomOrder()->value('id') ?? 1,
            'content'       => $this->faker->realText(60),
        ];
    }
}
