<?php

namespace Database\Factories;

use App\Models\Weight_Log;
use Illuminate\Database\Eloquent\Factories\Factory;

class Weight_LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Weight_Log::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber,
            'date' => $this->faker->date,
            'weight' => $this->faker->randomFloat(1,10,100),
            'calories' => $this->faker->randomNumber(4),
            'exercise_time' => $this->faker->time,
            'exercise_content' => $this->faker->realText(50),
        ];
    }
}
