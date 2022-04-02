<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObligacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcione_id')->constrained()->onDelete('cascade');
            $table->string('concepto');
            $table->date('fechalimite');
            $table->date('fechapagadototal')->nullable();
            $table->double('monto', 8, 2);
            $table->double('descuento', 8, 2);
            $table->double('montopagado', 8, 2);
            $table->double('montofinal', 8, 2);
            $table->tinyInteger('estado');
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
        Schema::dropIfExists('obligaciones');
    }
}
