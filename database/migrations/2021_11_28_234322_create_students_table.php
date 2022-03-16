<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('student_id')->primary();
            $table->unsignedBigInteger('user_id');        
            $table->unsignedBigInteger('class_id');  
            $table->string('first_name');
            $table->string('last_name');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_id')->references('class_id')->on('class');
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
        Schema::dropIfExists('students');
    }
}
