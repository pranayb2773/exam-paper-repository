<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\ExamPaper;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $arrBranchesList = [
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

        foreach ($arrBranchesList as $branch) {
            Branch::factory()->hasSubjects(20)->create([
                'name' => $branch
            ]);
        }

        ExamPaper::factory(200)->create();
    }
}
