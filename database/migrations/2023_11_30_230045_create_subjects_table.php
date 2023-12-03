<?php

use App\Models\Branch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('Description')->nullable();
            $table->string('status');
            $table->foreignIdFor(Branch::class, 'branch_id')->constrained();
            $table->integer('semister');
            $table->timestamps();

            $table->unique(['name', 'code']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
