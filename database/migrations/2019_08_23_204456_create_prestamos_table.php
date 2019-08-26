<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('user_id');
            $table->date('fecha_prestamo');
            $table->date('fecha_entrega');

            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');

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
        Schema::dropIfExists('prestamos');
    }
}
