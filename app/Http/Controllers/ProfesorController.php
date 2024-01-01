<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesores = Profesor::paginate(5);
        return view('admin.profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.profesores.create');
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
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'estudios' => 'required'
        ]);
        $profesor = new Profesor();
        $profesor->nombre = $request->get('nombre');
        $profesor->apellido = $request->get('apellido');
        $profesor->dni = $request->get('dni');
        $profesor->telefono = $request->get('telefono');
        $profesor->estudios = $request->get('estudios');
        $profesor->save();
        
        return redirect()->route('admin.profesores.index')->with('success','success');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profesor = Profesor::findOrFail($id);

        return view('admin.profesores.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'estudios' => 'required'
        ]);
        $profesor = Profesor::findOrFail($id);
        $profesor->nombre = $request->get('nombre');
        $profesor->apellido = $request->get('apellido');
        $profesor->dni = $request->get('dni');
        $profesor->telefono = $request->get('telefono');
        $profesor->estudios = $request->get('estudios');
        $profesor->update();
        
        return redirect()->route('admin.profesores.index')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profesor = Profesor::findOrFail($id);

        $profesor->delete();

        return redirect()->route('admin.profesores.index');
    }
}
