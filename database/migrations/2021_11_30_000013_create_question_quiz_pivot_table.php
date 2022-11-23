<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionQuizPivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_quiz', function (Blueprint $table) {
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
        });
    }
}
