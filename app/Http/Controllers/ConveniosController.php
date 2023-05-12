<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use Illuminate\Http\Request;

class ConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $convenios = Convenio::orderBy('id','desc')->paginate(10);
        return view('convenios.index',compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $convenio = $request->get('convenio');
        $convenios = new Convenio();

        $convenios->title = $title;
        $convenios->description = $description;
        $convenios->convenio = $convenio;
       
        $convenios->save();

        return redirect('convenios')->with('success','Añadido correctamente');
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
        $convenio = Convenio::find($id);
        return view('convenios.edit',compact('convenio'));
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
        $title = $request->get('title');
        $description = $request->get('description');
        $convenio = $request->get('convenio');

        $convenios = Convenio::find($id); 
        
        if ($convenio == null) {
            $convenio = $convenios->convenio;
        }
        $convenios->title = $title;
        $convenios->description = $description;
        $convenios->convenio = $convenio;

        $convenios->save();

        return redirect('convenios')->with('success','Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convenio = Convenio::find($id);
        $convenio->delete();
        return redirect('convenios')->with('success','Eliminado correctamente');
    }
}
