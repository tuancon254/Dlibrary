<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->char('title');
            $table->text('description');
            $table->date('date_of_issue');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('author');
            $table->boolean('approved');
            $table->timestamps(); 
        });


        Schema::create('document_semester',function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sem_id');
            $table->foreign('sem_id')->references('sem_id')->on('semester');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('document_id')->on('documents');
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
        Schema::dropIfExists('documents');
    }
}
