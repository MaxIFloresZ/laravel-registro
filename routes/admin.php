<?php

use App\Http\Controllers\BoletaNotaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;


Route::resource('/admin/estudiantes', EstudianteController::class)->names('admin.estudiantes');
Route::resource('/admin/profesores', ProfesorController::class)->names('admin.profesores');
Route::resource('/admin/cursos', CursoController::class)->names('admin.cursos');
Route::resource('/admin/boletanotas', BoletaNotaController::class)->names('admin.boletanotas');