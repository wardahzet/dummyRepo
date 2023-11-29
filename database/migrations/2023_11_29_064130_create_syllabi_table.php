<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyllabiTable extends Migration
{
    public function up()
    {
        Schema::create('syllabi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('author')->nullable();
            $table->string('head_of_study_program', 512)->nullable();
            $table->unsignedBigInteger('creator_user_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    public function down()
    {
        Schema::dropIfExists('syllabi');
    }
}
