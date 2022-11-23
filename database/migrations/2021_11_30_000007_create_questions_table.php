<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question_text');
            $table->longText('code_snippet')->nullable();
            $table->longText('answer_explanation')->nullable();
            $table->string('more_info_link')->nullable();
            $table->foreignId('topic_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
