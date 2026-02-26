<?php

namespace Database\Factories;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Task::class;
    public function definition(): array
    {
         return [
            'project_id' => Project::factory(), 
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'assigned_to' => $this->faker->name,
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'attachment' => null, 
        ];
    }
}
