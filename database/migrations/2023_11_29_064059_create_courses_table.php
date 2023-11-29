<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('study_program_id');
            $table->unsignedBigInteger('creator_user_id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->integer('course_credit')->nullable();
            $table->integer('lab_credit')->nullable();
            $table->enum('type', ['mandatory', 'elective'])->nullable();
            $table->text('short_description')->nullable();
            $table->string('minimal_requirement', 1024)->nullable();
            $table->text('study_material_summary')->nullable();
            $table->text('learning_media')->nullable();
            $table->timestamps();

            $table->foreign('creator_user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}