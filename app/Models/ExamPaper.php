<?php

namespace App\Models;

use App\Enums\ExamPaper\Type;
use App\Enums\Subject\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamPaper extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Type::class,
        'status' => Status::class,
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
