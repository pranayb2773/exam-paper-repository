<?php

namespace App\Enums\ExamPaper;

enum Type: string
{
    case MIDTERM = 'mid-term';
    case MAIN = 'main';
    case SUPPLY = 'supply';

    public function label(): string
    {
        return match ($this) {
            self::MIDTERM => 'Mid-Term Exam',
            self::MAIN => 'Main Exam',
            self::SUPPLY => 'Supply Exam'
        };
    }
}
