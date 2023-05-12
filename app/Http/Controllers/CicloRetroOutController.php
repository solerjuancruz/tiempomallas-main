<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;
use App\Models\Ciclo;
use app\Models\CicloRetroOut;

class CicloRetroOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ciclo $ciclosos, $id)
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('co');
        Carbon::now();
       //convertimos la fecha 1 a objeto Carbon
       $hoy = Carbon::now();
       $user_id = Auth::user()->cedula;
       $user_nombre = Auth::user()->name;
       $user_cedula = Auth::user()->cedula;
       $hoy = Carbon::now()->format('Y-m-d');
       $hora = Carbon::now()->format('H:i:s');
       $llave = $user_cedula. $hoy;
       $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
       $ciclosos=Ciclo::findOrFail($id);

  


        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $llave = $user_cedula. $hoy;
        $ciclosos = Ciclo::findOrFail($id);
        $ciclosos = new Ciclo();
        $ciclosos->nombre            = $user_nombre;
        $ciclosos->cedula            = $user_cedula;
        $ciclosos->fecha             = $hoy;
        $ciclosos->breakin           = $request->breakin;
        $ciclosos->llave             = $llave;

        $ciclosos->ingreso = $request->get('ingreso');
        $ciclosos->retro = $request->get('retro');


        $ciclosos->retroout = $request->get('retroout');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         /* almacenada el Fin de break al salir de la vista */
         $hoy = Carbon::now();
         $user_id = Auth::user()->cedula;
         $user_nombre = Auth::user()->name;
         $user_cedula = Auth::user()->cedula;
         $hoy = Carbon::now()->format('Y-m-d');
         $hora = Carbon::now()->format('H:i:s');
         $llave = $user_cedula. $hoy;
         $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
         $ciclosos=Ciclo::findOrFail($id);
         return view('cicloretroout.edit', compact('ciclosos','hoy','hora','llave','user_nombre','user_cedula',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('co');
        Carbon::now();
       //convertimos la fecha 1 a objeto Carbon
       $hoy = Carbon::now();
       $user_id = Auth::user()->cedula;
       $user_nombre = Auth::user()->name;
       $user_cedula = Auth::user()->cedula;
       $hoy = Carbon::now()->format('Y-m-d');
       $hora = Carbon::now()->format('H:i:s');
       $llave = $user_cedula. $hoy;
       $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
       $ciclosos=Ciclo::findOrFail($id);

       
       Carbon::setLocale('co');
       $date = Carbon::now()->format('Y-m-d');

        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $llave = $user_cedula. $hoy;
        $ciclosos = Ciclo::findOrFail($id);

        $ciclosos->ingreso = $request->get('ingreso');

        $ciclosos->retro = $request->get('retro');
        $ciclosos->retroout = $request->get('retroout');
        return view('cicloretroout.edit', compact('ciclosos','hoy','hora','llave','user_nombre','user_cedula'));
        
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
        date_default_timezone_set('America/Bogota');

        Carbon::setLocale('co');
        Carbon::now();

        //convertimos la fecha 1 a objeto Carbon
        $hoy = Carbon::now();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $llave = $user_cedula. $hoy;
        $carbon1 = new \Carbon\Carbon("2021-01-01 00:00:00");
        $ciclosos=Ciclo::findOrFail($id);

        

        $ciclosos->retro = $request->get('retro');
        $ciclosos->retroout = $request->get('retroout');

        $tiempoa = $request->get('retro');
        $tiempob = $request->get('retroout');
        $tiempoA = $carbon1->diffInMinutes($tiempoa);
        $tiempoB = $carbon1->diffInMinutes($tiempob);

        $ciclosos->timeretro = $tiempoB - $tiempoA;


        $ciclosos->save();
     
        return view('ciclosalida.edit', compact('ciclosos','hoy','hora','llave','user_nombre','user_cedula'));
     
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
