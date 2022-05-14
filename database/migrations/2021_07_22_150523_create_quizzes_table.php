<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('1_question');
            $table->string('1_answerA');
            $table->string('1_answerB');
            $table->string('1_answerC');
            $table->string('1_answerD');
            $table->string('1_correctAnswer');
            $table->string('2_question');
            $table->string('2_answerA');
            $table->string('2_answerB');
            $table->string('2_answerC');
            $table->string('2_answerD');
            $table->string('2_correctAnswer');
            $table->string('3_question');
            $table->string('3_answerA');
            $table->string('3_answerB');
            $table->string('3_answerC');
            $table->string('3_answerD');
            $table->string('3_correctAnswer');
            $table->string('4_question');
            $table->string('4_answerA');
            $table->string('4_answerB');
            $table->string('4_answerC');
            $table->string('4_answerD');
            $table->string('4_correctAnswer');
            $table->string('5_question');
            $table->string('5_answerA');
            $table->string('5_answerB');
            $table->string('5_answerC');
            $table->string('5_answerD');
            $table->string('5_correctAnswer');
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
