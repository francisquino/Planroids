<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sustancia;

class SustanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sustancias=Sustancia::orderBy('id','DESC')->paginate(3);
        return view('sustancia.index',compact('sustancias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sustancia.create');
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
        $this->validate($request,[ 'nombre'=>'required', 'vidaMedia'=>'required']);
        Sustancia::create($request->all());
        return redirect()->route('sustancia.index')->with('success','Registro creado satisfactoriamente');
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
        $sustancias=Sustancia::find($id);
        return  view('sustancia.show',compact('sustancias'));
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
        $sustancia=Sustancia::find($id);
        return view('sustancia.edit',compact('sustancia'));
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
        $this->validate($request,[ 'nombre'=>'required', 'vidaMedia'=>'required']);
 
        Sustancia::find($id)->update($request->all());
        return redirect()->route('sustancia.index')->with('success','Registro actualizado satisfactoriamente');
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
        Sustancia::find($id)->delete();
        return redirect()->route('sustancia.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
