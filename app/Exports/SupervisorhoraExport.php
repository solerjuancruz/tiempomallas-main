<?php

namespace App\Exports;

use App\Models\Ciclo;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupervisorhoraExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    /*     $users =DB::table('ciclos')
        ->join('users', 'users.cedula', '=', 'ciclos.cedula') 
        ->select( 'ciclos.id','ciclos.llave','users.name' )
        ->where('supervisor_name', '=', Auth::user()->name)
        ->orderBy('ciclos.id', 'asc')
        ->get();  */

        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $users =DB::table('ciclos')
        ->join('users', 'users.cedula', '=', 'ciclos.cedula') 
        ->select( /*'ciclos.id','ciclos.llave',*/ 'ciclos.nombre', 'ciclos.cedula','ciclos.fecha','ciclos.ingreso','ciclos.salida', 
        'ciclos.finturno','ciclos.breakin','ciclos.breakout','ciclos.timebreak', 'ciclos.almuerzo','ciclos.almuerzoout','ciclos.timelunch',
        'ciclos.timelunch', 'ciclos.capacitacion', 'ciclos.capout','ciclos.timecap','ciclos.pausas', 'ciclos.pausasout','ciclos.timepausas',
        /* 'ciclos.daño','ciclos.dañoout', 'ciclos.timedaño','ciclos.evaluacion','ciclos.evaluacionout','ciclos.timeeva', 'ciclos.retro',
        'ciclos.retroout','ciclos.timeretro','ciclos.reunion', 'ciclos.reunionout','ciclos.timereunion','ciclos.bano','ciclos.banoout', 'ciclos.timebano',
        'ciclos.calamidad','ciclos.calamidadout','ciclos.timecalamidad', 'ciclos.EmeMedica','ciclos.EmeMedicaout','ciclos.timeEmeMedica', */ 'ciclos.total',/*'ciclos.created_at','ciclos.updated_at',*/'ciclos.hoy', 'ciclos.hora')
          ->where('supervisor_name', '=', Auth::user()->name) 
          ->where('fecha','=', $date) 
          ->orderBy('ciclos.id', 'asc')
          ->get();

        
     /*    $users = Ciclo::join('users', 'users.cedula', '=', 'ciclos.cedula')
        ->select('*')
        ->get(); */



       /*  $users =DB::table('ciclos')
        ->join('users', 'users.cedula', '=', 'ciclos.cedula') 
        ->select('*')
        ->where('supervisor_name', '=', Auth::user()->name)
        ->orderBy('ciclos.id', 'asc')
        ->get();  */

        return $users;
    }
    public function headings(): array
    {
        return [
            'nombre',
            'Cedula',
            'fecha',
            'Ingreso',
            'Salida',
            'Tiempo',
            'breack',
            'Fin break',
            'Tiempo de Break',
            'almuerzo',
            'Fin Almuerzo',
            'Tiempo Almuerzo',
            'capacitacion',
            'Fin capacitacion',
            'Tiempo capacitacion',    
            'pausas',
            'Fin pausas',
            'Tiempo pausas',
           /*  'daño',
            'Fin daño',
            'Tiempo daño', 
            'evaluacion',
            'Fin evaluacion',
            'Tiempo evaluacion',
            'Retro',
            'Fin Retro',
            'Tiempo Retro',
            'Reunion',
            'Fin Reunion',
            'Tiempo Reunion',
            'Baño',
            'Fin Baño',
            'Tiempo Baño',
            'Calamidad',
            'Fin Calamidad',
            'Tiempo Calamidad',
            'Emergencia Medica',
            'Fin Emergencia Medica',
            'Tiempo Emergencia Medica', */
            'total',
         /* 'Fecha Creacion',
            'Fecha Actualizacion',
            'Hoy',
            'Hora', */


        ];
    }
}
