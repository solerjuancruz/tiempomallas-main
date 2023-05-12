<?php

namespace App\Http\Controllers;
use App\Models\Malla;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MallasController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Malla::all();
        return view('horacorte.mallas',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('horacorte.createmallas', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $inicio = Carbon::parse($request->input('horainicio'));
        $salida = Carbon::parse($request->input('horafinal'));
        $almuerzoinicio = Carbon::parse($request->input('almuerzoinicio'));
        $almuerzofinal = Carbon::parse($request->input('almuerzofinal'));
        
        $almuerzo = $almuerzofinal->diffInHours($almuerzoinicio);
        // Verificar si la hora de inicio es mayor a la hora final
        if ($inicio->greaterThan($salida)) {
            // Escenario 2: Hora de inicio mayor a la hora final (misma día)
            echo 'La hora de inicio no puede ser mayor a la hora de salida';
        } else {
            // Escenario 1: Hora de inicio menor o igual a la hora final
            $totalhoras = $salida->diffInHours($inicio);
            
            $totalhoras -= $almuerzo;
        

  
        $mallas = new Malla();
        $mallas ->users_id= $request->get('users_id');
        $mallas ->semana= $request->get('semana');
        $mallas ->campaña=$request->get('campaña');
        $mallas ->foco=$request->get('foco');
        $mallas ->encargado=$request->get('encargado');
        $mallas ->horainicio= $request->get('horainicio');
        $mallas ->horafinal= $request->get('horafinal');
        $mallas ->descanso1= $request->get('descanso1');
        $mallas ->almuerzoinicio= $request->get('almuerzoinicio');
        $mallas ->almuerzofinal= $request->get('almuerzofinal');
        $mallas ->descanso2= $request->get('descanso2');
        $mallas ->horastotal = $totalhoras;
        $mallas ->diadescanso= $request->get('diadescanso');

        $mallas ->save();

        return redirect()->action([MallasController::class, 'index']);
        }
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
    public function edit( $id)
    {

      $mallas = Malla::find($id);
        return view('horacorte.editmallas',compact('mallas'));
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
        
        $inicio = Carbon::parse($request->input('horainicio'));
        $salida = Carbon::parse($request->input('horafinal'));
        $almuerzoinicio = Carbon::parse($request->input('almuerzoinicio'));
        $almuerzofinal = Carbon::parse($request->input('almuerzofinal'));
        
        $almuerzo = $almuerzofinal->diffInHours($almuerzoinicio);
        // Verificar si la hora de inicio es mayor a la hora final
        if ($inicio->greaterThan($salida)) {
            // Escenario 2: Hora de inicio mayor a la hora final (misma día)
            echo 'La hora de inicio no puede ser mayor a la hora de salida';
        } else {
                // Escenario 1: Hora de inicio menor o igual a la hora final
                $totalhoras = $salida->diffInHours($inicio);
            
                $totalhoras -= $almuerzo;
      
                $malla = Malla::find($id);
           // $malla ->users_id= $request->get('users_id');
                $malla ->semana= $request->get('semana');
                $malla ->campaña=$request->get('campaña');
                $malla ->foco=$request->get('foco');
                $malla ->encargado=$request->get('encargado');
                $malla ->horainicio= $request->get('horainicio');
                    $malla ->horafinal= $request->get('horafinal');
                $malla ->descanso1= $request->get('descanso1');
                $malla ->almuerzoinicio= $request->get('almuerzoinicio');
                $malla ->almuerzofinal= $request->get('almuerzofinal');
                $malla ->descanso2= $request->get('descanso2');
                $malla ->horastotal = $totalhoras;
                $malla ->diadescanso= $request->get('diadescanso');

        $malla ->save();

        return redirect()->action([MallasController::class, 'index',]);  
       }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Malla::destroy($id);
        return back()->with('danger');
    }
}