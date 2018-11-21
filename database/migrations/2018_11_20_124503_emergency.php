<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emergency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tittle',150)->nullable();
            $table->string('description',200)->nullable();
            $table->string('action',150)->nullable();
            $table->string('img_referential',200)->nullable();
            $table->string('latitud',30)->nullable();
            $table->string('longuitud',30)->nullable();
            $table->string('img_ico',100)->nullable();
            $table->string('cargo',100)->nullable();
            $table->string('name',200)->nullable();
            $table->string('phone',15)->nullable();

            $table->date('date')->nullable();
            $table->string('hour',8)->nullable();


            $table->integer('district_id')->unsigned()->index();
            $table->foreign('district_id')->references('id')->on('ubigeo_district')->onDelete('cascade');
            $table->string('pid_created',15);
            $table->foreign('pid_created')->references('num_doc')->on('persona')->onDelete('cascade');
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
        Schema::dropIfExists('emergency');
    }
}
