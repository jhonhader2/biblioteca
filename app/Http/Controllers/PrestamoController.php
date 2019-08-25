<?php

namespace App\Http\Controllers;

use App\Model\Estado;
use App\Model\Libro;
use App\Model\Prestamo;
use App\Model\User;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    private function libros(){
        $librosxx=['' => 'Seleccione'];
        foreach(Libro::get() as $librosx){
            $librosxx[$librosx->id] = $librosx->name;
        }
        return $librosxx;
    }
    
    private function usuarios(){
        $usuarios = ['' => 'Seleccione'];
        foreach(User::get() as $usersxxx){
            $usuarios[$usersxxx->id] = $usersxxx->name;
        }
        return $usuarios;
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
        $prestamos = Prestamo::get();

        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros     = $this->libros();
        $usuarios   = $this->usuarios();
        $estados    = $this->estados();
        
        return view('prestamos.create', compact('libros', 'usuarios', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestamo = new Prestamo();

        $prestamo->libro_id         = $request->input('libro_id');
        $prestamo->user_id          = $request->input('user_id');
        $prestamo->fecha_prestamo   = $request->input('fecha_prestamo');
        $prestamo->fecha_entrega    = $request->input('fecha_entrega');
        $prestamo->estado_id        = $request->input('estado_id');

        //dd($request);
    
        $prestamo->save();


        return redirect()->route('prestamos.index');
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
    public function edit(Prestamo $prestamo)
    {
        $libros     = $this->libros();
        $usuarios   = $this->usuarios();
        $estados    = $this->estados();
        
        return view('prestamos.edit', compact('prestamo', 'libros', 'usuarios', 'estados'));
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
        $prestamo = Prestamo::findOrFail($id);

        $prestamo->libro_id         = $request->input('libro_id');
        $prestamo->user_id          = $request->input('user_id');
        $prestamo->estado_id        = $request->input('estado_id');
        $prestamo->fecha_prestamo   = $request->input('fecha_prestamo');
        $prestamo->fecha_entrega    = $request->input('fecha_entrega');

        //dd($prestamo);

        $prestamo->save();
        
        return redirect()->route('prestamos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        //dd($id);

        $prestamo->delete();

        return redirect()->route('prestamos.index');
    }
}
