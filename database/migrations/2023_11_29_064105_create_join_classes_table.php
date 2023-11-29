<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinClassesTable extends Migration
{
    public function up()
    {
        Schema::create('join_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_class_id');
            $table->unsignedBigInteger('student_user_id');
            $table->timestamps();

            $table->foreign('student_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('join_classes');
    }
}