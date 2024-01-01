<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cursos = Curso::paginate(5);
        $profesor = Profesor::all();
        return view('admin.cursos.index', compact('cursos', 'profesor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $profesores = Profesor::all();
        return view('admin.cursos.create', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $curso = new Curso();
        $curso->nombre = $request->get('nombre');
        $curso->descripcion = $request->get('descripcion');
        $curso->aforo = $request->get('aforo');
        $curso->fechaInicio = $request->get('fechaInicio');
        $curso->fechaFin = $request->get('fechaFin');
        $curso->id_profe = $request->get('id_profe');
        $curso->save();

        return redirect()->route('admin.cursos.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cursos = Curso::findOrFail($id);
        $profesores = Profesor::all();

        return view('admin.cursos.edit', compact('cursos','profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cursos = Curso::findOrFail($id);
        $cursos->nombre = $request->get('nombre');
        $cursos->descripcion = $request->get('descripcion');
        $cursos->aforo = $request->get('aforo');
        $cursos->fechaInicio = $request->get('fechaInicio');
        $cursos->fechaFin = $request->get('fechaFin');
        $cursos->id_profe = $request->get('id_profe');
        $cursos->update();

        return redirect()->route('admin.cursos.index')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('admin.cursos.index');
    }
}
