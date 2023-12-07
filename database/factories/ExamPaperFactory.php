<?php

namespace Database\Factories;

use App\Enums\ExamPaper\Type;
use App\Enums\Subject\Status;
use App\Models\ExamPaper;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ExamPaperFactory extends Factory
{
    protected $model = ExamPaper::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(Type::cases()),
            'status' => $this->faker->randomElement(Status::cases()),
            'description' => $this->faker->text(),
            'subject_id' => Subject::inRandomOrder()->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
