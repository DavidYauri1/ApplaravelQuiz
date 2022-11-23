<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('result')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('time_spent')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('quiz_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
