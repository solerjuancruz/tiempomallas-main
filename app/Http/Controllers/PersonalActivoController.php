<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;
use App\Models\Ciclo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CicloExport;
use Illuminate\Support\Facades\Gate;


class PersonalActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Hgeneral'), 403);
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('d-m-Y');
        $today= Carbon::now()->format('Y-m-d');
        $fecha= Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s A');
        $llave = $user_cedula. $hoy;
        $ciclosos = Ciclo::orderBy('created_at', 'desc')->paginate(20);

       return view ('personalgeneral.index',compact('ciclosos','hoy','hora','user_id','user_nombre','user_cedula','llave','today','fecha'));

    }

    public function searchpersonalgeneral( Request $request)

    {
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $user_cedula = Auth::user()->cedula;
        $hoy = Carbon::now()->format('d-m-Y');
        $today= Carbon::now()->format('Y-m-d');
        $fecha= Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s A');
        $llave = $user_cedula. $hoy;
        $ciclosos = Ciclo::all();
        $searchpersonalgeneral = $request->get('searchpersonalgeneral');
        $ciclosos = Ciclo::firstOrNew()->where('cedula', 'like', '%'.$searchpersonalgeneral.'%')->orderBy('fecha', 'desc')->paginate(30);
        return view('personalgeneral.index', ['personalgeneral' => $ciclosos],compact('ciclosos','hoy','hora','user_id','user_nombre','user_cedula','llave','today','fecha'));
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
    public function store(Request $request)
    {
        //
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
        $mapa = Ciclo::find($id);
        return view('personalgeneral.mappersonalgeneral', compact('mapa')); 
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

    public function exportExcel()
    {

        return Excel::download(new CicloExport, 'ciclo-list.xlsx');
    }
}
