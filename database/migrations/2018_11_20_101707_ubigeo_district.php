<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UbigeoDistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubigeo_district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',6)->unique();
            $table->string('name',100);
            $table->integer('province_id')->unsigned()->index();
            $table->foreign('province_id')->references('id')->on('ubigeo_province')->onDelete('cascade');
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
        Schema::dropIfExists('ubigeo_district');
    }
}
