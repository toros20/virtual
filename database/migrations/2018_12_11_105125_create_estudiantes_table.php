<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('cuenta', 8)->unique();
            $table->date('fecha_nacimiento');
            $table->boolean('activo');
            $table->timestamps();

           /* prebasica 20181001-20181999
            basica bilingue 20182001-20182999
            basica español 20183
            media bilingue 20184
            media español  20185

            1 4 40 = 160  2019
            2 3 4 5 6 *4 = 20 *40 800  600 
            7 8 9 * 4 = 12 *40 480  360*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
