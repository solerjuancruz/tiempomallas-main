<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CicloSalida;
use App\Models\Ciclo;
use Carbon\carbon;
use App\Http\Requests\CicloRequest;
use Illuminate\Support\Facades\Auth;

class CicloSalidaTController extends Controller
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
    public function store(CicloRequest $request, Ciclo $ciclosos)
    {
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

       
        $ingreso =$ciclosos->ingreso;
        $salida  =$ciclosos->salida;
        $ingresoA = $carbon1->diffInMinutes($ingreso);
        $salidaB = $carbon1->diffInMinutes($salida);
        $total = ($salidaB - $ingresoA);
        $total = number_format($total,1,'.',',');
        $request->validate([
            'llave'          => ['required|unique:ciclos,llave'],
        ]);

        $ciclosos = new Ciclo();
        $ciclosos->nombre            = $user_nombre;
        $ciclosos->cedula            = $user_cedula;
        $ciclosos->fecha             = $request->fecha;
        $ciclosos->ingreso           = $ingreso;
        $ciclosos->salida            = $salida;
        $ciclosos->llave             = $llave;
        $ciclosos->total             = $request->total;

        $ciclosos->save();
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
        //
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

       
        $ingreso =$ciclosos->ingreso;
        $salida  =$request->get('salida');
        $timelunch = $ciclosos->timelunch;
        $ingresoA = $carbon1->diffInMinutes($ingreso);
        $salidaB = $carbon1->diffInMinutes($salida);
        $total1 = ($salidaB - $ingresoA);
        $total2 = $total1 - $timelunch;
        $total = $total2/60;
        $total = number_format($total,1,'.',',');
        $ciclosos->finturno = $total;
        $ciclosos->save();

        $whole = floor($total); // 1 
        $fraction = $total - $whole;
        $totalmin = $fraction * 60;

        $total = $whole.':'.$totalmin;

       // return response($whole.':'.$totalmin);
        return view('ciclosalidaout.edit' ,compact('total','ciclosos','ciclosos','hoy','hora','llave','user_nombre','user_cedula'));
   
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

        $ingreso =$ciclosos->ingreso;
        $salida  =$request->get('salida');
        $timelunch = $ciclosos->timelunch;
        $ingresoA = $carbon1->diffInMinutes($ingreso);
        $salidaB  = $carbon1->diffInMinutes($salida);
        $total1 = ($salidaB - $ingresoA);
        $total2 = $total1 - $timelunch;
        $total = $total2/60;
        $ciclosos->finturno = $total;
        $total = number_format($total,1,'.',',');
        $ciclosos->save();

        $datosCiclo =request()->except(['_token','_method']);
        Ciclo::where('id','=',$id)->update($datosCiclo);
     
    // return view('ciclosalida.edit', compact('total','ciclosos','hoy','hora','llave','user_nombre','user_cedula'));
       //return redirect()->route('/ciclosalidaout/' . $ciclosos->id . '/edit', compact('total','ciclosos','hoy','hora','llave','user_nombre','user_cedula'));
       return redirect()->route('home', compact('total'));
    
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
