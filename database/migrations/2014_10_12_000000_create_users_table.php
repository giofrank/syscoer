<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('codid',150)->unique();
            $table->string('pid',15);
            $table->string('escid',150)->nullable();
            $table->string('sede',150)->nullable();
            $table->string('password',255);
            $table->string('state',2)->nullable();
            $table->rememberToken();
            $table->timestamps();
            // $table->primary(array('id','codid', 'pid'));
            $table->foreign('pid')->references('num_doc')->on('persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}