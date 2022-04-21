<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name');
            $table->timestamps();
        });


        Schema::create('permissions', function(Blueprint $table){
            $table->id('per_id');
            $table->string('per_name');
            $table->string('slug');
            $table->integer('parent_id');
            $table->timestamps();
        });

        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('per_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('per_id')->references('per_id')->on('permissions');
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
        Schema::dropIfExists('role');
    }
}
