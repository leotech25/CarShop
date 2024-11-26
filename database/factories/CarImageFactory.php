<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_id' => 1, // We have to provide for which car we are creating an image during creation process
            'image_path' => fake()->imageUrl(),
            'position' => function (array $attributes) {
                return Car::find($attributes['car_id'])->images()->count() + 1;
            }
        ];
    }
}
