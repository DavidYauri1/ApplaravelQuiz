<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('public')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
