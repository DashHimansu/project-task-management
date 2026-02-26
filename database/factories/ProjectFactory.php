<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Project::class;
    public function definition(): array
    {
         $start = $this->faker->dateTimeBetween('-1 month', 'now');
        $end = $this->faker->dateTimeBetween('now', '+1 month');

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'start_date' => $start,
            'end_date' => $end,
        ];
    }
}
