<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPersonaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id_per');
            $table->string('tip_document',1)->nullable();
            $table->string('num_doc',15)->unique();
            $table->string('apell_pater',150);
            $table->string('apell_mat',150);
            $table->string('nombres',150);
            $table->string('email',100)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('celular',9)->nullable();
            $table->string('photo',9)->nullable();
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
        Schema::dropIfExists('persona');
    }
}
