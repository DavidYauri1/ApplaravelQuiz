<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->id();
            $table->string('option');
            $table->boolean('correct')->default(0)->nullable();
            $table->foreignId('question_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
