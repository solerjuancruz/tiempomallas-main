<?php

namespace App\Http\Controllers;

use App\Exports\SupervisorExport;
use App\Exports\SupervisorhoraExport;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PersonalSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $ciclosos =DB::table('ciclos')
        ->join('users', 'users.cedula', '=', 'ciclos.cedula') 
        ->select( '*')
          ->where('supervisor_name', '=', Auth::user()->name) 
          ->where('fecha','=', $date) 
          ->orderBy('ciclos.id', 'asc')
          ->paginate(10);
        return view('horacorte.edit', compact('ciclosos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate(10);
        return view('horacorte.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
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
    public function edit()
    {
        $user_nombre = Auth::user()->name;
        $users = User::where('supervisor_name', '=', $user_nombre)
        ->paginate(10) ;
        return view('horacorte.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user = User::find($id);
        if ( $user->supervisor_name != null) {
            return redirect()->route('superpersonal.edit','1')->with('warning', 'el usuario esta asignado a ' . $user->supervisor_name);
        }else{
            
        $user->supervisor_name = Auth::user()->name;
        $user->save();
        return redirect()->route('superpersonal.edit','1')->with('success', 'usuario agregado');
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
        $user = User::find($id);
        $user->supervisor_name = '';
        $user->save();
       return redirect()->route('superpersonal.edit','1')->with('danger', 'usuario removido correctamente');
       /* return back()->with('success'. 'usuario eliminado correctamente'); */
    }
    public function exportExcel()
    {
        return Excel::download(new SupervisorhoraExport, 'Hora-list.xlsx'); 
    }

    public function searchsuperpersonal(Request $request)
    {
        $users = User::where('cedula', '=', $request->get('text'))
        ->paginate(10);
        return view('horacorte.create', compact('users'));

    }
    public function searchsuperpersonalindex(Request $request)
    {
        $user_nombre = Auth::user()->name;
        $users = User::where('cedula', '=', $request->get('text'))
        ->where('supervisor_name', '=', $user_nombre)
        ->paginate(10);
        return view('horacorte.index', compact('users'));

    }
}
