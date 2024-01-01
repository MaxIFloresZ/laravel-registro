<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta_notas', function (Blueprint $table) {
            $table->id();
            $table->double('Nota_1',8, 2);
            $table->double('Nota_2',8, 2);
            $table->double('Nota_3',8, 2);
            $table->double('notapromedio',8, 2);
            $table->year('ano_estudio');

            $table->unsignedBigInteger('id_Curso');
            $table->foreign('id_Curso')->references('id')->on('cursos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('id_estudiante');
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('boleta_notas');
    }
};
