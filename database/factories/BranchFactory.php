<?php

namespace Database\Factories;

use App\Enums\Branch\Status;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

    private function branchList(): array
    {
        return [
            "Mechanical Engineering",
            "Computer Science and Engineering",
            "Civil Engineering",
            "Electronics and Computer Engineering",
            "Electronics and Electrical Engineering",
            "Information Technology",
            "Artificial Intelligence and Machine Learning",
            "Data Sciences",
            "BioTechnology",
            "Chemical Engineering",
            "Cyber Security",
            "Computer Engineering",
            "Automobile Engineering",
            "Telecom and Electronics Engineering",
            "Agricultural Engineering",
            "Food Technology"
        ];
    }
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->branchList()),
            'description' => $this->faker->text(),
            'no_of_semisters' => $this->faker->numberBetween(1, 8),
            'status' => $this->faker->randomElement(Status::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
