<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Ciclo;
use App\Models\Registro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registro = Registro::all();

        $hoy = Carbon::now()->format('d-m-Y');
        $today = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $ago = Carbon::now()->diffForHumans();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $llave = $user_cedula. $hoy;
        $ciclosos= Ciclo::all();
        $ciclosos = Ciclo::orderBy('fecha', 'desc')->where('nombre','=', $user_nombre)->where('fecha','=', $today)->paginate(10);

        return view('ciclo.index', compact('hoy','hora','ago', 'registro', 'ciclosos','user_id','user_nombre','user_cedula','llave'));
    }

    public function create()
    {
        $hoy = Carbon::today()->format('d-m-Y');
        $hora = Carbon::now()->format('H:i:s');
        $ago = Carbon::now()->diffForHumans();
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $llave = $user_cedula. $hoy;
        $ciclosos= Ciclo::all();

        return view('ciclo..create', compact('hoy','hora','ago','user_id','user_nombre','user_cedula','llave','ciclosos'));
    }

    public function store(Request $request)
    {

        $hoy = Carbon::today();
        $hora = Carbon::now()->format('H:i:s');
        // $ago = Carbon::now()->diffForHumans('contenedor_reloj');
        $user_ced = Auth::user()->cedula;
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;
        // $request->validate([
        //      'llave' => 'required|unique:entrada,llave',
        //  ]);

       $registro = new Registro();
       $registro->id_user = $user_id;
       $registro->cedula = $user_ced;
       $registro->nombre = $user_nombre;
       $registro->fecha = $hoy;
       $registro->entrada = $hora;
       $registro->llave = $user_id.$hoy;

       $registro->save();
        return response()->json($registro);

      // return back();
    }
}
