<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('comment_text');
            $table->foreignId('question_id')->nullable()->constrained();
            $table->foreignId('quiz_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
