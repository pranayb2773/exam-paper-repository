<?php

namespace Database\Factories;

use App\Enums\Subject\Status;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    private function subjectList(): array
    {
        return [
            "Physics",
            "Mathematics",
            "Chemistry",
            "Mechanics",
            "English",
            "Electrical Technology",
            "Engineering Drawing and Graphics",
            "Programming",
            "Data Structures",
            "Computer Science and Programming",
            "Basic Chemistry",
            "Linear Algebra",
            "Data Structure and Algorithm",
            "Basic Electronics"
        ];
    }
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->subjectList()),
            'code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'Description' => $this->faker->text(),
            'status' => $this->faker->randomElement(Status::cases()),
            'branch_id' => $this->faker->randomNumber(),
            'semister' => $this->faker->numberBetween(1, 8),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
