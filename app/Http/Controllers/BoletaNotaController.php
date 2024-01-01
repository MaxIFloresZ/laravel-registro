<?php

namespace App\Http\Controllers;

use App\Models\BoletaNota;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class BoletaNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boletaN = BoletaNota::paginate(5);
        $cursos = Curso::all();
        $estudiantes = Estudiante::all();

        return view('admin.boletaNotas.index', compact('boletaN', 'cursos','estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('admin.boletaNotas.create', compact('estudiantes','cursos'));
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
        $Boletanotas = new BoletaNota();
        $Boletanotas ->Nota_1 = $request->get('Nota_1');
        $Boletanotas ->Nota_2 = $request->get('Nota_2');
        $Boletanotas ->Nota_3 = $request->get('Nota_3');
        $prom = ($Boletanotas ->Nota_1 + $Boletanotas ->Nota_2 + $Boletanotas ->Nota_3)/3;
        $Boletanotas ->notapromedio = $prom;
        $Boletanotas->ano_estudio = $request->get('ano_estudio');
        $Boletanotas ->id_Curso = $request->get('id_Curso');
        $Boletanotas ->id_estudiante = $request->get('id_estudiante');
        $Boletanotas->save();

        return redirect()->route('admin.boletanotas.index')->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoletaNota  $boletaNota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoletaNota  $boletaNota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $boletanotas = BoletaNota::findOrFail($id);
        $cursos = Curso::all();
        $estudiantes = Estudiante::all();
        return view('admin.boletaNotas.edit',compact('boletanotas','cursos','estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoletaNota  $boletaNota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Boletanotas = BoletaNota::findOrFail($id);
        $Boletanotas ->Nota = $request->get('Nota');
        $Boletanotas ->id_Curso = $request->get('id_Curso');
        $Boletanotas ->id_estudiante = $request->get('id_estudiante');
        $Boletanotas->update();

        return redirect()->route('admin.boletanotas.index')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoletaNota  $boletaNota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $boletanotas = BoletaNota::findOrFail($id);
        $boletanotas->delete();

        return redirect()->route('admin.boletanotas.index');

    }
}
