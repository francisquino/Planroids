<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Sustancia;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=Producto::orderBy('id','DESC')->paginate(3);
        return view('Producto.index',compact('productos'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sustancias=Sustancia::orderBy('id','ASC')->get();
        return view('producto.create',compact('sustancias'));
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

        /*
        //Mostrar el contenido de lo que nos pasan en $request 
        print_r ($request->all());
        echo("----");
        dd(request()->all());
        */

        $request->validate(['nombre'=>'required']);
        $producto = Producto::create($request->only(['nombre']));

        /*$sustancias = explode(",", $request->get('sustancia'));
        $sustancia_ids = [];
        foreach ($sustancias as $sustancia) {
            $sustancia_db = Sustancia::where('nombre', trim($sustancia))->firstOrCreate(['nombre' => trim($sustancia)]);
            $sustancia_ids[] = $sustancia_db->id;
        }
        $producto->sustancias()->attach($sustancia_ids);*/


        //$producto = Producto::find($id);

        $producto->sustancias()->sync($request->input('sustancias'));

        //return redirect()->route('producto.index');
        return redirect()->route('producto.index')->with('success','Registro creado satisfactoriamente');
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
        $productos=Producto::find($id);
        return  view('producto.show',compact('productos'));
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
        $producto=Producto::find($id);
        return view('producto.edit',compact('producto'));
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
        $this->validate($request,[ 'nombre'=>'required']);
 
        Producto::find($id)->update($request->all());
        return redirect()->route('producto.index')->with('success','Registro actualizado satisfactoriamente');
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
        Producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
