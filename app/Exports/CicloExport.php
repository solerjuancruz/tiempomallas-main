<?php

namespace App\Exports;

use App\Models\Ciclo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CicloExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ciclo::all();
    }

    public function headings(): array
    {
 return [
        'id',
        'llave',
        'nombre',
        'cedula',
        'fecha',
        'ingreso',
        'salida',
        'finturno',
        'breakin',
        'breakout',
        'timebreak',
        'almuerzo',
        'almuerzoout',
        'timelunch',
        'capacitacion',
        'capout',
        'timecap',
        'pausas',
        'pausasout',
        'timepausas',
        'daño',
        'dañoout',
        'timedaño',
        'evaluacion',
        'evaluacionout',
        'timeeva',
        'retro',
        'retroout',
        'timeretro',
        'reunion',
        'reunionout',
        'timereunion',
        'dano',
        'danoout',
        'timedano',
        'calamidad',
        'calamidadout',
        'timecalamidad',
        'EmeMedica',
        'EmeMedicaout',
        'timeEmeMedica',
        'total',
        'created_at',
        'updated_at',
 ];
    }
}