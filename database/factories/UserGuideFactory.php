<?php

namespace Database\Factories;

use App\Models\UserGuide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserGuide>
 */
class UserGuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ protected $model = UserGuide::class;
    public function definition(): array
    {
        return [
            'key' => $this->faker->word,
            'value' => $this->faker->sentence,
            'sup_menu_id' => null, // You might want to generate a parent ID if needed
        ];
    }
}
