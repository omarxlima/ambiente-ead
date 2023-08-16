<?php

namespace Database\Factories;

use App\Models\Course;
use illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->name();
        return [
            'id' => Str::uuid(),
            'course_id' => Course::factory(),
            'name' => $name,

        ];
    }
}
