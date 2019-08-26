<?php

namespace App\Http\Controllers;

use App\Model\Autor;
use App\Model\Libro;
use App\Model\Categoria;
use App\Model\Estado;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    private function autores(){
        $autorxxx = ['' => 'Seleccione'];
        foreach (Autor::get() as $autorx) {
            $autorxxx[$autorx->id] = $autorx->name;
        }

        return $autorxxx;
    }

    private function categorias(){
        $categoriaxxx = ['' => 'Seleccione'];
        foreach (Categoria::get() as $categoriax) {
            $categoriaxxx[$categoriax->id] = $categoriax->name;
        }

        return $categoriaxxx;
    }
    
    private function estados(){
        $estados = ['' => 'Seleccione'];
        foreach(Estado::get() as $estadoxx){
            $estados[$estadoxx->id] = $estadoxx->name;
        }
        return $estados;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::get();

        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados    = $this->estados();
        $categorias = $this->categorias();
        $autores    = $this->autores();

        //dd($categorias);

        return view('libros.create', compact('categorias', 'autores', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $libro = new Libro();

        $libro->name            = $request->input('name');
        $libro->autor_id        = $request->input('autor_id');
        $libro->categoria_id    = $request->input('categoria_id');
        $libro->estado_id      = $request->input('estado_id');

        $libro->save();

        return redirect()->route('libros.index')->with('success', 'el libro ha sido creado con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
