<?php

use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('exam_papers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignIdFor(Subject::class, 'subject_id');
            $table->timestamps();

            $table->unique(['name', 'type', 'subject_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_papers');
    }
};
