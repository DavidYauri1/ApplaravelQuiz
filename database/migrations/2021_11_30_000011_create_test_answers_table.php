<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('test_answers', function (Blueprint $table) {
            $table->id();
            $table->boolean('correct')->default(0)->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('test_id')->nullable()->constrained();
            $table->foreignId('question_id')->nullable()->constrained();
            $table->foreignId('option_id')->nullable()->references('id')->on('questions_options');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
